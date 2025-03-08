<?php

function getAllEvents() {
    $conn = getConnection();
    $sql = "SELECT * FROM event";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getEventById($eid) {
    $conn = getConnection();
    $sql = "SELECT * FROM event WHERE eid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
function searchEvent(string $search, $startDate = null, $endDate = null): array
{
    $conn = getConnection();
    $sql = "SELECT * FROM event WHERE eventname LIKE ?";
    $params = [];
    $types = "s";
    
    // เพิ่ม wildcard (%) เพื่อให้ค้นหาได้ถูกต้อง
    $search = "%" . $search . "%";
    $params[] = $search;

    if (!empty($startDate) && !empty($endDate)) {
        $sql .= " AND date BETWEEN ? AND ?";
        $params[] = $startDate;
        $params[] = $endDate;
        $types .= "ss";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}

function createEvent($uid, $eventname, $max_participants, $description, $image, $statusevent, $date) {
    $conn = getConnection();
    $sql = "INSERT INTO event (uid, date, eventname, max_participants, description, image, statusevent) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $uid, $date, $eventname, $max_participants, $description, $image, $statusevent);
    return $stmt->execute();
}

function getUserEvents($uid) {
    $conn = getConnection();
    $sql = "SELECT * FROM event WHERE uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    $events = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $events;
}

function updateEvent($eid, $eventname, $max_participants, $description, $imageurl, $statusevent) {
    $conn = getConnection();
    $sql = "UPDATE event SET  eventname=?, max_participants=?, description=?, imageurl=?, statusevent=? WHERE eid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssi",  $eventname, $max_participants, $description, $imageurl, $statusevent, $eid);
    return $stmt->execute();
}

function deleteEvent($event_id) {
    $conn = getConnection();

    // ดึงรายการไฟล์ภาพที่เกี่ยวข้องกับกิจกรรม
    $sql = "SELECT image_path FROM event_images WHERE event_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // ลบไฟล์ภาพออกจากเซิร์ฟเวอร์
    while ($row = $result->fetch_assoc()) {
        $imagePath = $row['image_path'];
        if (!empty($imagePath) && file_exists($imagePath)) {
            unlink($imagePath); // ลบไฟล์
        }
    }

    $stmt->close();

    // ลบรายการภาพออกจากตาราง event_images
    $sql = "DELETE FROM event_images WHERE event_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $stmt->close();

    // ลบกิจกรรมจากตาราง events
    $sql = "DELETE FROM event WHERE eid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $success = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $success;
}


function searchEvents(string $keyword): array
{
    $conn = getConnection();
    $sql = 'SELECT * FROM event WHERE eventname LIKE ?';
    $stmt = $conn->prepare($sql);
    $keyword = '%' . $keyword . '%';
    $stmt->bind_param('s', $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function uploadEventImages($eventId, $files) {
    $uploadedFiles = [];
    $uploadDir = 'uploads/';
    $conn = getConnection();
    // ตรวจสอบโฟลเดอร์ uploads
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // สร้างโฟลเดอร์ถ้ายังไม่มี
    }

    // อัพโหลดไฟล์หลายๆไฟล์
    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $fileExtension = pathinfo($files['name'][$key], PATHINFO_EXTENSION);
        $uploadFile = $uploadDir . uniqid() . '.' . $fileExtension;

        if (move_uploaded_file($tmp_name, $uploadFile)) {
            $uploadedFiles[] = $uploadFile; // เก็บไฟล์ที่อัพโหลด
        }
    }

    // เก็บไฟล์ในตาราง event_images
    foreach ($uploadedFiles as $uploadedFile) {
        $stmt = $conn->prepare("INSERT INTO event_images (event_id, image_path) VALUES (?, ?)");
        $stmt->bind_param("is", $eventId, $uploadedFile);
        if (!$stmt->execute()) {
            return false; // ถ้ามีข้อผิดพลาดในการ execute
        }
    }

    return true; // สำเร็จ
}

function getEventImages($eventId) {
    $conn = getConnection();
    $imagesQuery = "SELECT image_path FROM event_images WHERE event_id = ?";
    $stmt = $conn->prepare($imagesQuery);
    
    // ผูกพารามิเตอร์
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    
    // รับผลลัพธ์
    $result = $stmt->get_result();
    $images = [];
    
    // ดึงข้อมูลรูปภาพจากฐานข้อมูล
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['image_path']; // เก็บเส้นทางของรูปภาพ
    }
    
    // คืนค่าผลลัพธ์
    return $images;
}

function updateParticipantStatus($eid, $uid, $status) {
    $conn = getConnection();
    $sql = "UPDATE event_members SET status = ? WHERE eid = ? AND uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $status, $eid, $uid);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}
?>

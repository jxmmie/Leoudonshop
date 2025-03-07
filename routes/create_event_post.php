<?php
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid']; // รับ uid จาก session
} else {
    $data['alert'] = "กรุณาเข้าสู่ระบบก่อนสร้างกิจกรรม";
    echo $data['alert'];
    exit;
}

$eventname = $_POST['activityName'];
$max_participants = $_POST['participants'];
$description = $_POST['activityDetails'];
$statusevent = 'active';
$date = $_POST['date'];

// ตรวจสอบโฟลเดอร์ uploads
$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true); // สร้างโฟลเดอร์ถ้ายังไม่มี
}

// ตรวจสอบว่าอัพโหลดไฟล์หรือไม่
if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
    $uploadedFiles = [];
    $totalFiles = count($_FILES['images']['name']);

    // อัพโหลดไฟล์ทีละไฟล์
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileExtension = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
        $uploadFile = $uploadDir . uniqid() . '.' . $fileExtension;

        // ย้ายไฟล์ที่อัพโหลด
        if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $uploadFile)) {
            $uploadedFiles[] = $uploadFile;
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์ที่ " . ($_FILES['images']['name'][$i]) . "<br>";
        }
    }

    // ถ้ามีการอัพโหลดไฟล์ทั้งหมด
    if (!empty($uploadedFiles)) {
        // บันทึกข้อมูลกิจกรรมพร้อมกับไฟล์ที่อัพโหลด
        $result = createEvent($uid, $eventname, $max_participants, $description, $uploadedFiles, $statusevent, $date);
        if ($result) {
            echo "<script>alert('สร้างกิจกรรมสำเร็จ!'); window.location.href='/event';</script>";
        } else {
            echo "<script>alert('สร้างกิจกรรมไม่สำเร็จ!'); window.location.href='/event';</script>";
        }
    } else {
        echo "ไม่พบไฟล์ที่อัพโหลด";
    }
} else {
    echo "ไม่พบไฟล์ที่อัพโหลด.";
}

?>

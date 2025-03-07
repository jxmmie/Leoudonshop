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

$fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$uploadFile = $uploadDir . uniqid() . '.' . $fileExtension;

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
    $result = createEvent($uid, $eventname, $max_participants, $description, $uploadFile, $statusevent, $date);
    if ($result) {
        echo "<script>alert('สร้างกิจกรรมสำเร็จ!'); window.location.href='/event';</script>";
    } else {
        echo "<script>alert('สร้างกิจกรรมไม่สำเร็จ!'); window.location.href='/event';</script>";
    }
} else {
    echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
}
?>

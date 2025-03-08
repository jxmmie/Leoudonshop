<?php
$eventname = $_POST['activityName'];
$max_participants = $_POST['participants'];
$description = $_POST['activityDetails'];
$statusevent = 'active';
$date = $_POST['date'];

// เชื่อมต่อฐานข้อมูล
$conn = getConnection();

// ตรวจสอบว่าอัพโหลดไฟล์หรือไม่
if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
    // เรียกใช้ฟังก์ชัน uploadEventImages เพื่ออัพโหลดไฟล์และแทรกข้อมูลลงฐานข้อมูล
    $result = uploadEventImages($_FILES['images'], $eventname, $max_participants, $description, $statusevent, $date);

    if ($result) {
        echo "<script>alert('สร้างกิจกรรมสำเร็จ!'); window.location.href='/event';</script>";
    } else {
        echo "<script>alert('สร้างกิจกรรมไม่สำเร็จ!'); window.location.href='/event';</script>";
    }
} else {
    echo "ไม่พบไฟล์ที่อัพโหลด.";
}

?>

<?php
// ในไฟล์ create_event_post.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $imageurl = 'default.jpg'; // แทนที่ด้วย imageurl ที่ถูกต้อง
    $statusevent = 'active';
    $date = $_POST['date'];

    $result = createEvent($uid, $eventname, $max_participants, $description, $imageurl, $statusevent, $date);

    if ($result) {
        echo "<script>alert('สร้างกิจกรรมสำเร็จ!'); window.location.href='/event';</script>";
     
    } else {
        echo "<script>alert('สร้างกิจกรรมไม่สำเร็จ!'); window.location.href='/event';</script>";
    }
} else {
    $data['alert'] = "Invalid request";
    echo $data['alert'];
}
?>

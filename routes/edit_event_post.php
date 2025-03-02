<?php
// ในไฟล์ update_event_post.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['uid'])) {
        $uid = $_SESSION['uid']; // รับ uid จาก session
    } else {
        $data['alert'] = "กรุณาเข้าสู่ระบบก่อนแก้ไขกิจกรรม";
        echo $data['alert'];
        exit;
    }

    // ตรวจสอบว่ามี eid หรือไม่
    if (!isset($_POST['eid'])) {
        $data['alert'] = "ไม่พบ ID กิจกรรม";
        echo $data['alert'];
        exit;
    }

    $eid = $_POST['eid']; // รับ eid จาก form

    $eventname = $_POST['activityName'];
    $max_participants = $_POST['participants'];
    $description = $_POST['activityDetails'];
    $imageurl = 'default.jpg'; // แทนที่ด้วย imageurl ที่ถูกต้อง
    $statusevent = 'active';
    $createdate = $_POST['date'];

    $result = updateEvent($eid, $eventname, $max_participants, $description, $imageurl, $statusevent, $createdate);

    if ($result) {
        $data['alert'] = "แก้ไขกิจกรรมสำเร็จ";
        echo $data['alert'];
    } else {
        $data['alert'] = "แก้ไขกิจกรรมไม่สำเร็จ";
        echo $data['alert'];
    }
} else {
    $data['alert'] = "Invalid request";
    echo $data['alert'];
}
?>
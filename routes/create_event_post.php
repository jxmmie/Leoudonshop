<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $uid = $_POST['uid'];
    $eventname = $_POST['eventname'];
    $max_participants = $_POST['max_participants'];
    $description = $_POST['description'];
    $imageurl = $_POST['imageurl'];
    $statusevent = $_POST['statusevent'];

    // เรียกใช้ฟังก์ชัน createEvent เพื่อบันทึกข้อมูลลงในฐานข้อมูล
    if (createEvent($uid, $eventname, $max_participants, $description, $imageurl, $statusevent)) {
        echo "<p>กิจกรรมถูกสร้างสำเร็จ!</p>";
    } else {
        echo "<p>เกิดข้อผิดพลาดในการสร้างกิจกรรม</p>";
    }
}
?>

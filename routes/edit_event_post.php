<?php
// ในไฟล์ update_event_post.php

 
    $eid = $_POST['eid']; // รับ eid จาก form

    $eventname = $_POST['eventname'];
    $max_participants = $_POST['max_participants'];
    $description = $_POST['description'];
    $image = 'default.jpg'; // แทนที่ด้วย imageurl ที่ถูกต้อง
    $statusevent = 'active';
    $date = $_POST['date'];

    $result = updateEvent($eid, $eventname, $max_participants, $description, $imageurl, $statusevent, $date);

    if ($result) {
        echo "<script>alert('แก้ไขกิจกรรมสำเร็จ!'); window.location.href='/event';</script>";

    } else {
        echo "<script>alert('แก้ไขกิจกรรมไม่สำเร็จ!'); window.location.href='/event';</script>";

    }
?>


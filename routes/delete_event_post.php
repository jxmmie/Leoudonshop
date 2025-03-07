<?php
// ในไฟล์ update_event_post.php

$event_id = $_POST['eid']; // รับ eid จาก form

    $resultdl = deleteEvent($event_id);
    if ($resultdl) {
        echo "<script>alert('ลบกิจกรรมเรียบร้อย!'); window.location.href='/event';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการลบกิจกรรม!'); window.location.href='/event';</script>";
    }
?>

<?php
// ในไฟล์ update_event_post.php

$eid = $_POST['eid']; // รับ eid จาก form
$eventname = $_POST['eventname'];
$max_participants = $_POST['max_participants'];
$description = $_POST['description'];
$image = 'default.jpg'; // ถ้าไม่มีรูปใหม่ให้ใช้ default
$statusevent = 'active';
$date = $_POST['date'];

// อัปเดตกิจกรรม
$result = updateEvent($eid, $eventname, $max_participants, $description, $image, $statusevent, $date);

if ($result) {
    echo "<script>alert('แก้ไขกิจกรรมสำเร็จ!'); window.location.href='/event';</script>";
} else {
    echo "<script>alert('แก้ไขกิจกรรมไม่สำเร็จ!'); window.location.href='/event';</script>";
}

// ถ้าต้องการลบกิจกรรมเมื่อมีเงื่อนไข เช่น สถานะถูกตั้งค่าเป็น 'delete'
if (isset($_POST['delete']) && $_POST['delete'] === 'yes') {
    $resultdl = deleteEvent($eid);
    if ($resultdl) {
        echo "<script>alert('ลบกิจกรรมเรียบร้อย!'); window.location.href='/event';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการลบกิจกรรม!'); window.location.href='/event';</script>";
    }
}
?>

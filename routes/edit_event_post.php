<?php
// ในไฟล์ update_event_post.php
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

    $eventname = $_POST['eventname'];
    $max_participants = $_POST['max_participants'];
    $description = $_POST['description'];
    $imageurl = 'default.jpg'; // แทนที่ด้วย imageurl ที่ถูกต้อง
    $statusevent = 'active';
    $date = $_POST['date'];

    $result = updateEvent($eid, $eventname, $max_participants, $description, $imageurl, $statusevent, $date);

    if ($result) {
        echo "<script>alert('แก้ไขกิจกรรมสำเร็จ!'); window.location.href='/event_user';</script>";

    } else {
        echo "<script>alert('แก้ไขกิจกรรมไม่สำเร็จ!'); window.location.href='/event_user';</script>";

    }
} else {
    $data['alert'] = "Invalid request";
    echo $data['alert'];
}
?>


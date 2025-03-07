<?php
// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['emid'])) {
    $emid = $_POST['emid'];
    $status = $_POST['status'];

    // เรียกใช้ฟังก์ชัน updateParticipantStatus() เพื่ออัปเดตสถานะ
    $result = updateParticipantStatus($emid, $status);

    if ($result) {
        // อัปเดตสำเร็จ
        // Redirect กลับไปยังหน้า list_event_get หรือแสดงข้อความสำเร็จ
        header("Location: /list_event_get?eid=" . $_GET['eid']); // แก้ไขตาม URL ของคุณ
        exit();
    } else {
        // อัปเดตล้มเหลว
        // แสดงข้อความผิดพลาด
        echo "เกิดข้อผิดพลาดในการอัปเดตสถานะ";
    }
} else {
    // ถ้าไม่มีการส่งข้อมูล POST หรือ emid ไม่มีค่า
    echo "ไม่พบข้อมูลที่ส่งมา หรือ emid ไม่ถูกต้อง";
}
?>
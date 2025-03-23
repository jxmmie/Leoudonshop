<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eid'], $_POST['uid'], $_POST['status'])) {
    $eid = $_POST['eid'];
    $uid = $_POST['uid'];
    $status = $_POST['status'];

    if ($status == "ยกเลิก") {
        // เรียกใช้ฟังก์ชัน deleteParticipant() เพื่อลบข้อมูล
        if (updateParticipantStatus($eid, $uid, $status)) {
            // อัปเดตสำเร็จ
            echo "<script>alert('ยกเลิก');</script>";
        } else {
            // อัปเดตไม่สำเร็จ
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตสถานะ');</script>";
        }
    } else {
        // เรียกใช้ฟังก์ชัน updateParticipantStatus() เพื่ออัปเดตสถานะ
        if (updateParticipantStatus($eid, $uid, $status)) {
            // อัปเดตสำเร็จ
            echo "<script>alert('ยืนยันสำเร็จ');</script>";
        } else {
            // อัปเดตไม่สำเร็จ
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตสถานะ');</script>";
        }
    }
} else {
    echo "<script>alert('ข้อมูลไม่ถูกต้อง');</script>";
}

?>
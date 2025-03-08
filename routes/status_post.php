<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eid'], $_POST['uid'], $_POST['status'])) {
    $eid = $_POST['eid'];
    $uid = $_POST['uid'];
    $status = $_POST['status'];

    // เรียกใช้ฟังก์ชัน updateParticipantStatus()
    if (updateParticipantStatus($eid, $uid, $status)) {
        // อัปเดตสำเร็จ
        header("Location: list_event"); // เปลี่ยนเส้นทางกลับไปหน้ารายชื่อ
        exit();
    } else {
        // อัปเดตไม่สำเร็จ
        echo "เกิดข้อผิดพลาดในการอัปเดตสถานะ";
    }
} else {
    echo "ข้อมูลไม่ถูกต้อง";
}

?>
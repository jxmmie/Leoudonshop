<?php




    $eid = $_POST['eid'];
    $uid = $_POST['uid'];
    $status = $_POST['status'];

    if ($status == "ยกเลิก") {
        // เรียกใช้ฟังก์ชัน deleteParticipant() เพื่อลบข้อมูล
        if (deleteParticipant($eid, $uid)) {
            // ลบข้อมูลสำเร็จ
            echo "<script>alert('ไม่อนุญาติให้เข้าร่วม');  window.location.href='/list_event';</script>";
        } else {
            // ลบข้อมูลไม่สำเร็จ
            echo "<script>alert('เกิดข้อผิดพลาดในการลบข้อมูล');  window.location.href='/list_event';</script>";
        }
    } else {
        // เรียกใช้ฟังก์ชัน updateParticipantStatus() เพื่ออัปเดตสถานะ
        if (updateParticipantStatus($eid, $uid, $status)) {
            // อัปเดตสำเร็จ
            echo "<script>alert('ยืนยันสำเร็จ'); window.location.href='/list_event';</script>";
        } else {
            // อัปเดตไม่สำเร็จ
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตสถานะ'); window.location.href='/list_event';</script>";
        }
    }


?>
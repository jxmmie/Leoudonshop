<?php
 $cd = $_POST['cd'];
 $eid = $_POST['eid'];
 $uid = $_POST['uid'];
 if ($cd === getCheckCode($eid)){
    

    $status ="เช็คชื่อแล้ว";
   
        if (updateParticipantStatus($eid, $uid, $status)) {
            // อัปเดตสำเร็จ
            echo "<script>alert('เช็คชื่อแล้ว'); window.location.href='/detail';</script>";
        } 

 }else {
    // อัปเดตไม่สำเร็จ
    echo "<script>alert('เช็คชื่อไม่ได้'); window.location.href='/detail';</script>";
}
<?php
// ตรวจสอบว่ามีการส่งค่า event_name มาหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $uid = $_POST['uid'];
    $eid = $_POST['eid'];
    if ( $uid ==  $_SESSION['uid']){
        $event = getEventById($eid);
        renderView('edit_event_get',['event' => $event]); 
    } else {
        if (createEventmember($uid, $eid)) {
       
            echo "<script>alert('สมาชิกถูกเพิ่มเข้าสู่กิจกรรมเรียบร้อยแล้ว!'); window.location.href='/event';</script>";
        } else {
            echo "<script>alert('สมัครไปแล้ววว!'); window.location.href='/event';</script>";
        }
    }
    
}
?>
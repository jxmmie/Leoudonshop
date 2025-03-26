<?php
// ตรวจสอบว่ามีการส่งค่า event_name มาหรือไม่

    // รับข้อมูลจากฟอร์ม
    $_SESSION['uidget'] = $_POST['uid'];
    $_SESSION['eidget'] = $_POST['eid'];
    $event = getEventById($_SESSION['eidget']);
    if ( $_SESSION['uidget'] ==  $event['uid']){

        echo "<script> window.location.href='/edit_event';</script>";
      
    } else {
        if (createEventmember($_SESSION['uidget'], $_SESSION['eidget'])) {
       
            echo "<script>alert('สมาชิกถูกเพิ่มเข้าสู่กิจกรรมเรียบร้อยแล้ว!'); window.location.href='/event';</script>";
        } else {
            echo "<script>alert('สมัครไปแล้ววว!'); window.location.href='/event';</script>";
        }
    }
    
    
    
?>
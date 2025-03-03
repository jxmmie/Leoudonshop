<?php
// ตรวจสอบว่ามีการส่งค่า event_name มาหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $uid = $_POST['uid'];
    $eid = $_POST['eid'];

    // เรียกใช้ฟังก์ชัน
    if (createEventmember($uid, $eid)) {
        echo "สมาชิกถูกเพิ่มเข้าสู่กิจกรรมเรียบร้อยแล้ว!";
    } else {
        echo "สมาชิกนี้ได้ถูกเพิ่มไปยังกิจกรรมนี้แล้ว!";
    }
}
?>
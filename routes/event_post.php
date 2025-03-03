<?php

// ตรวจสอบว่าได้รับ 'eid' จากฟอร์มหรือ URL หรือไม่
if (isset($_POST['eid']) || isset($_GET['eid'])) {
    $eid = isset($_POST['eid']) ? $_POST['eid'] : $_GET['eid'];

    // เรียกฟังก์ชัน getEventById เพื่อดึงข้อมูล
    $event = getEventById($eid);
    
    if ($event) {
        // ถ้ามีข้อมูลกิจกรรม
  
        renderView('detail_get',['event' => $event]);

    } else {
        // ถ้าไม่พบข้อมูล
        echo "ไม่พบกิจกรรมนี้";
        exit();
    }
} else {
    echo "ไม่พบ ID ของกิจกรรม";
    exit();
}
?>
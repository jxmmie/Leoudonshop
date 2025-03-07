<?php

// ตรวจสอบว่าได้รับ 'eid' จากฟอร์มหรือ URL หรือไม่

    $eid = isset($_POST['eid']) ? $_POST['eid'] : $_GET['eid'];
    $_SESSION['mes'] = $_POST['uid'];
    // เรียกฟังก์ชัน getEventById เพื่อดึงข้อมูล
  $event = getEventById($eid);
    $chk = isMemberExist($_SESSION['mes'], $eid);
    if ($event) {
        // ถ้ามีข้อมูลกิจกรรม
  
        renderView('detail_get',['event' => $event]);

    } else {
        // ถ้าไม่พบข้อมูล
        echo "ไม่พบกิจกรรมนี้";
        exit();
    }
?>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eid = $_POST['eid'];
    $status = $_POST['status'];

   
    $event = getEventById($eid);

    if (!$event) {
        echo "ไม่พบกิจกรรม";
        exit;
    }

    if (!isset($_SESSION['uid']) || $event['uid'] != $_SESSION['uid']) {
        echo "คุณไม่มีสิทธิ์อัปเดตสถานะกิจกรรมนี้";
        exit;
    }

   
    if (updatestatusevent($eid, $status, $_SESSION['uid'])) { 
        echo "อัปเดตสถานะกิจกรรมสำเร็จ";
        header("Location: /detail?eid=$eid");
        exit; 
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตสถานะกิจกรรม";
    }
} else {
    echo "ไม่พบข้อมูล POST";
}
?>
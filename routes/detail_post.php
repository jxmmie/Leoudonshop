<?php
session_start();
require 'EventModel.php'; // โหลด Model

// ตรวจสอบว่ามีการส่งค่า event_name มาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eid'])) {
    $_SESSION['selectedEvent'] = $_POST['eid'];
}

// ถ้าไม่มีค่าใน Session ให้กลับไปที่หน้าแรก
if (!isset($_SESSION['selectedEvent'])) {
    header("Location: /event");
    exit();
}

$event =   getEventById($_SESSION['selectedEvent']);

if (!$event) {
    echo "ไม่พบกิจกรรม";
    exit();
}
?>
<?php
session_start(); // ตรวจสอบว่า session เปิดหรือยัง
if (!isset($_SESSION['uid'])) {
    echo "กรุณาเข้าสู่ระบบ";
    exit;
}

$uid = $_SESSION['uid'];




$events = getUserEvents($uid);
?>

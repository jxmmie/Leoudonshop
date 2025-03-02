<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // ตรวจสอบว่ามี email นี้ในระบบหรือยัง
    if (getUserByEmail($email)) {
        echo "อีเมลนี้ถูกใช้ไปแล้ว!";
        exit;
    }

    // สร้างบัญชีผู้ใช้ใหม่
    if (createUser($f_name, $l_name, $email, $password, $gender)) {
        echo "<script>alert('สมัครสมาชิกสำเร็จ!'); window.location.href='/login.php';</script>";
   
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด!'); window.location.href='/register.php';</script>";

    }
} else {
    echo "Method Not Allowed";
}
?>

<?php




// อัปเดตข้อมูลในฐานข้อมูลหากส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = $_SESSION['uid']; // ดึง uid จาก session
    $updatedFirstName = htmlspecialchars($_POST['f_name']);
    $updatedLastName = htmlspecialchars($_POST['l_name']);
    $updatedEmail = htmlspecialchars($_POST['email']);

    if (updateUserProfile($uid, $updatedFirstName, $updatedLastName, $updatedEmail)) {
        echo "<script>alert('อัปเดตข้อมูลสำเร็จ!'); window.location.href='/profileuser';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล!');</script>";
    }
}

?>
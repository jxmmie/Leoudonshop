<?php
// ในไฟล์ update_event_post.php

$eid = $_POST['eid']; // รับ eid จาก form
$files = isset($_FILES['images']) ? $_FILES['images'] : null;
$photo = uploadEventImages($eid, $files);
if ($photo) {
    echo "<script>alert('Upload!'); window.location.href='/edit_event';</script>"; 
} else {
    echo "<script>alert('ผิดพลาด!'); window.location.href='/edit_event';</script>";
}
?>

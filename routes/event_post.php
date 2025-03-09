<?php

// ตรวจสอบว่าได้รับ 'eid' จากฟอร์มหรือ URL หรือไม่

    $_SESSION['eid'] = isset($_POST['eid']) ? $_POST['eid'] : $_GET['eid'];
    $_SESSION['mes'] = $_POST['uid'];
    echo "<script>window.location.href='/detail';</script>";    
?>
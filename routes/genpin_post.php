<?php
 $eid = $_POST['eid'];
 $uid = $_POST['uid'];
 $_SESSION['code'] = insertCheckCode($eid,$uid);
 echo "<script>alert('สร้างรหัสแล้ว!'); window.location.href='/list_event';</script>";
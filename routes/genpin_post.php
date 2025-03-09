<?php
 $eid = $_POST['eid'];
 $_SESSION['code'] = insertCheckCode($eid);
 echo "<script>alert('สร้างรหัสแล้ว!'); window.location.href='/detail';</script>";
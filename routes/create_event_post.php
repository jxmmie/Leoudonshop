<?php

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION['uid'])) {
    // หากผู้ใช้ยังไม่เข้าสู่ระบบ ให้ทำการเปลี่ยนเส้นทางไปยังหน้าล็อกอิน
    header('Location: login.php');
    exit();
}

$uid = $_SESSION['uid']; // แทนที่ด้วย UID ของผู้ใช้จริง

// รับข้อมูลจากฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventname = isset($_POST['activityName']) ? trim($_POST['activityName']) : '';
    $max_participants = isset($_POST['participants']) ? intval($_POST['participants']) : 0;
    $description = isset($_POST['activityDetails']) ? trim($_POST['activityDetails']) : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $files = isset($_FILES['images']) ? $_FILES['images'] : null;
    $statusevent = "ยังไม่เริ่ม";
    // ตรวจสอบข้อมูลที่จำเป็น
    if (empty($eventname) || empty($max_participants) || empty($description) || empty($date)) {
        // ถ้าข้อมูลที่จำเป็นไม่ครบ ให้แสดงข้อความแจ้งเตือน
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); window.history.back();</script>";
        exit();
    }

    // ตรวจสอบว่าไฟล์ถูกอัปโหลดหรือไม่
    if ($files && $files['error'][0] == UPLOAD_ERR_NO_FILE) {
        echo "<script>alert('กรุณาเลือกไฟล์รูปภาพเพื่ออัปโหลด'); window.history.back();</script>";
        exit();
    }

    // สร้างกิจกรรมcreateEvent($uid, $eventname, $max_participants, $description,  , $date, $files)
    $result = createEvent($uid, $eventname, $max_participants, $description, $statusevent, $date, $files);

    if ($result) {
        // หากการสร้างกิจกรรมสำเร็จ
        echo "<script>alert('กิจกรรมได้ถูกสร้างสำเร็จ!'); window.location.href = '/event';</script>";
    } else {
        // หากมีข้อผิดพลาดในการสร้างกิจกรรม
        echo "<script>alert('เกิดข้อผิดพลาดในการสร้างกิจกรรม'); window.history.back();</script>";
    }
}

?>

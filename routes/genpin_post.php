<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once MAIL_DIR . '/src/PHPMailer.php';
require_once MAIL_DIR . '/src/Exception.php';
require_once MAIL_DIR . '/src/SMTP.php';

function sendMail(string $to, string $body): bool
{
    $mail = new PHPMailer(true);
    try {
        // ตั้งค่า SMTP Server
        $mail->isSMTP();
        $mail->Host = 'th55.ruk-com.in.th'; // SMTP Server ของคุณ
        $mail->SMTPAuth = true;
        $mail->Username = 'leoudonee@leo-udon.shop'; // อีเมลของคุณ
        $mail->Password = 'TmJpeukPHscqzm4CP3wT'; // รหัสผ่านของอีเมล
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // ใช้ TLS
        $mail->Port = 587; // พอร์ต 587 สำหรับ STARTTLS

        // ตั้งค่าผู้ส่งและผู้รับ
        $mail->setFrom('leoudonee@leo-udon.shop', 'Leo Udon Mail'); // เปลี่ยนชื่อผู้ส่งได้
        $mail->addAddress($to); // อีเมลผู้รับจากฟอร์ม

        // ตั้งค่าเนื้อหาของอีเมล
        $mail->isHTML(true);
        $mail->Subject = 'Leo Udon'; // หัวข้ออีเมล
        $mail->Body = "<p>{$body}</p>"; // ข้อความที่จะแสดงในอีเมล

        $mail->send();
        return true; // ส่งอีเมลสำเร็จ
    } catch (Exception $e) {
        echo "❌ ส่งอีเมลล้มเหลว: {$mail->ErrorInfo}";
        return false; // ส่งอีเมลล้มเหลว
    }
}

$eid = $_POST['eid'];
$uid = $_POST['uid'];

// Get email of the user using their ID
$userEmail = getEmailById($uid);
$to = $userEmail['email']; // ดึงอีเมลจากอาร์เรย์

// Create check code and store in session
$_SESSION['code'] = insertCheckCode($eid, $uid);
$body = 'รหัสเช็คของคุณคือ, ' . $_SESSION['code'];

// Send the email and get the result
$result = sendMail($to, $body);

// Check result of email sending
if ($result) {
    echo "ส่งอีเมลสำเร็จ!";
} else {
    echo "ส่งอีเมลไม่สำเร็จ";
}

// Redirect to list_event page
// echo "<script>alert('สร้างรหัสแล้ว!'); window.location.href='/list_event';</script>";
?>

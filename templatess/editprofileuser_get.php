<?php


if (!isset($_SESSION['uid'])) {
    echo "กรุณาเข้าสู่ระบบ";
    exit;
}

$uid = $_SESSION['uid'];
$user = getUserDetailsById($uid);

if (!$user) {
    echo "ไม่พบข้อมูลผู้ใช้";
    exit;
}

// ดึงค่าจากอาร์เรย์ และใช้ htmlspecialchars() ป้องกัน XSS
$firstname = htmlspecialchars($user['f_name']);
$lastname = htmlspecialchars($user['l_name']);
$email = htmlspecialchars($user['email']);


// อัปเดตข้อมูลในฐานข้อมูลหากส่งฟอร์ม


?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์ของฉัน</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #6e6e6e;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #9e9e9e;
            width: 80%;
            max-width: 500px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            background: #444;
            padding: 10px;
            border-radius: 5px;
            color: #f1f1f1;
            margin-bottom: 10px;
        }

        .form-group label {
            font-weight: bold;
            color: #ffcc00;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .save-button {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
            display: block;
            width: 100%;
            text-align: center;
        }

        .save-button:hover {
            background-color: #0056b3;
        }

        .back-button {
            background-color: #333;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
            display: block;
            width: 100%;
            text-align: center;
        }

        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 style="text-align: center;">ข้อมูลโปรไฟล์</h2>
        <form method="post" action="/editprofileuser">
            <div class="form-group">
                <label>ชื่อ</label>
                <input type="text" name="f_name" value="<?php echo $firstname; ?>" required>
            </div>
            <div class="form-group">
                <label>นามสกุล</label>
                <input type="text" name="l_name" value="<?php echo $lastname; ?>" required>
            </div>
            <div class="form-group">
                <label>อีเมล</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <button type="submit" class="save-button">บันทึก</button>
        </form>
        <button class="back-button" onclick="window.history.back();">ย้อนกลับ</button>
    </div>
</body>

</html>

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
$lastname =  htmlspecialchars($user['l_name']);
$email = htmlspecialchars($user['email']);
$gender = htmlspecialchars($user['gender']);
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

        .form-group div {
            font-size: 16px;
            color: #d3d3d3;
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
        <div class="form-group">
            <label>ชื่อ</label>
            <div><?php echo $firstname; ?></div>
        </div>
        <div class="form-group">
            <label>นามสกุล</label>
            <div><?php echo $lastname; ?></div>
        </div>
        <div class="form-group">
            <label>รหัส UID</label>
            <div><?php echo $uid; ?></div>
        </div>
        <div class="form-group">
            <label>เพศ</label>
            <div><?php echo $gender; ?></div>
        </div>
        <div class="form-group">
            <label>อีเมล</label>
            <div><?php echo $email; ?></div>
        </div>
        <button class="back-button" onclick="window.history.back();">ย้อนกลับ</button>
    </div>
    
</body>

</html>
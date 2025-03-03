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
            display: flex;
            background-color: #9e9e9e;
            width: 80%;
            max-width: 900px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            align-items: center;
        }

        .profile-header {
            width: 40%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-right: 30px;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #555;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .upload-button {
            display: inline-block;
            background-color: #555;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .upload-button:hover {
            background-color: #444;
        }

        .profile-details {
            width: 60%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            background: #444;
            padding: 10px;
            border-radius: 5px;
            color: #f1f1f1;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #ffcc00; /* สีหัวข้อ */
        }

        .form-group div {
            font-size: 16px;
            color: #d3d3d3; /* สีข้อความ */
        }

        .back-button {
            background-color: #333;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <img src="profile.jpg" alt="">
            <label for="uploadProfile" class="upload-button">อัปโหลดโปรไฟล์</label>
            <input type="file" id="uploadProfile" accept="image/*" hidden>
        </div>
        <div class="profile-details">
            <div class="form-group">
                <label>ชื่อ</label>
                <div>ธิวากร</div>
            </div>
            <div class="form-group">
                <label>นามสกุล</label>
                <div>จำปาบุรี</div>
            </div>
            <div class="form-group">
                <label>รหัส UID</label>
                <div>1234567890</div>
            </div>
            <div class="form-group">
                <label>เพศ</label>
                <div>ชาย</div>
            </div>
            <div class="form-group">
                <label>อีเมล</label>
                <div>your-email@example.com</div>
            </div>
        </div>
    </div>
    <button class="back-button" onclick="window.history.back();">ย้อนกลับ</button>
</body>
</html>

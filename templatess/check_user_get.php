<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์ของฉัน</title>
    <style>
        /* ปิดการแสดงผลสกอบา */
        body {
            overflow: hidden;
        }

        /* ใส่สไตล์อื่นๆ ตามปกติ */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(110, 110, 110);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-top: 60px;
            box-sizing: border-box;
        }

     
        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            margin-right: 10px;
        }

        .search-box input[type="text"] {
            border: none;
            outline: none;
            padding: 5px;
        }

        .search-icon,
        .clear-icon {
            margin-left: 5px;
            cursor: pointer;
        }

        .notification-icon,
        .menu-icon {
            margin-left: 10px;
            cursor: pointer;
            font-size: 24px;
        }

        /* เมนูเลื่อนลง */
        .dropdown-container {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
            top: 100%;
        }

        .dropdown-container:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }

        /* Profile Page */
        .container {
            display: flex;
            justify-content: center;
            width: 83%;
            background-color: rgb(161, 161, 161);
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
            min-height: 700px;
            margin-top: 80px; /* เพิ่มระยะห่างจาก navbar */
        }

        /* Left Column: Circle Block */
        .circle-block {
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background-color: #555;
            position: absolute;
            margin-right: 70%;
            margin-top: 3%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .circle-block1 {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #bbb;
            position: absolute;
            margin-left: 23%;
            margin-top: 7%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Left Column: Rectangle Block */
        .rectangle-block {
            width: 300px;
            height: 300px;
            background-color: #444;
            position: absolute;
            margin-right: 70%;
            margin-top: 20%;
            border-radius: 20%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Right Column: Profile Details */
        .profile-details {
            display: flex;
            flex-direction: column;
            gap: 30px;
            flex-grow: 1;
            min-width: 250px;
            padding-bottom: 30px;
            margin-left: 50%;
            margin-top: 80px;
        }

        .profile-details .form-group {
            margin-bottom: 15px;
        }

        .profile-details .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .profile-details .form-group div {
            width: 100%;
            max-width: 300px;
            padding: 10px;
            border: 1px solid #888;
            border-radius: 5px;
            background-color: #555;
            color: white;
            text-align: left;
        }

        /* Back Button */
        .back-button {
            background-color: #333;
            color: white;
            padding: 25px 35px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 20%;
            position: absolute;
            margin-left: 1%;
            margin-right: 73%;
            margin-top: 45%;
        }

        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    

    <!-- Profile Section -->
    <div class="container">
        <div class="circle-block"></div>
        <div class="rectangle-block">
            <div class="circle-block1"></div>
        </div>

        <div class="profile-details">
            <div class="form-group">
                <label for="firstName">ชื่อ</label>
                <div id="firstName">ธิวากร</div>
            </div>
            <div class="form-group">
                <label for="lastName">นามสกุล</label>
                <div id="lastName">จำปาบุรี</div>
            </div>
            <div class="form-group">
                <label for="uid">รหัส UID</label>
                <div id="uid">1234567890</div>
            </div>
            <div class="form-group">
                <label for="gender">เพศ</label>
                <div id="gender">ชาย</div>
            </div>
            <div class="form-group">
                <label for="email">อีเมล</label>
                <div id="email">your-email@example.com</div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <button class="back-button">ย้อนกลับ</button>

</body>

</html>

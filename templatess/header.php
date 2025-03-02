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

        /* Navbar */
        nav {
            background-color: #ddd;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
            box-sizing: border-box; /* เพื่อให้แน่ใจว่า padding ไม่ทำให้ navbar ยาวเกิน */
        }

        .nav-left,
        .nav-right {
            display: flex;
            align-items: center;
        }

        .nav-item {
            margin-right: 20px;
        }

        .nav-item a {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav>
        <div class="nav-left">
            <span class="nav-item"><a href="#">กิจกรรม</a></span>
            <span class="nav-item"><a href="#">Home</a></span>
        </div>
        <div class="nav-right">
            <div class="search-box">
                <input type="text" placeholder="ค้นหา...">
                <span class="search-icon"></span>
                <span class="clear-icon">X</span>
            </div>
            <span class="notification-icon"></span>
            <div class="dropdown-container">
                <span class="menu-icon">☰</span>
                <div class="dropdown-menu">
                    <a href="#">โปรไฟล์</a>
                    <a href="#">กิจกรรมของฉัน</a>
                    <a href="#">ประวัติ</a>
                    <a href="#">สร้างกิจกรรม</a>
                </div>
            </div>
        </div>
    </nav>


</body>

</html>

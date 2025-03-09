<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์ของฉัน</title>
    <style>
        /* ปิดการแสดงสกอบาร์ */
        body {
            overflow: hidden;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #707070; /* สีเทากลาง */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-top: 60px;
            box-sizing: border-box;
        }

        /* Navbar */
        nav {
            background-color: #333; /* สีเทาเข้ม */
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
            box-sizing: border-box;
        }

        .nav-left,
        .nav-right {
            display: flex;
            align-items: center;
        }

        .nav-item a {
            text-decoration: none;
            color: #fff; /* สีขาว */
            font-size: 16px;
            margin-right: 20px;
            transition: 0.3s;
        }

        .nav-item a:hover {
            color: #ffcc00; /* สีเหลืองเมื่อ hover */
        }

        /* ช่องค้นหา */
        .search-box {
            background: #555;
            padding: 5px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            padding: 5px;
            color: white;
        }

        .search-icon {
            margin-left: 5px;
            color: white;
        }

        .clear-icon {
            margin-left: 5px;
            color: red;
            cursor: pointer;
        }

        /* ไอคอน */
        .notification-icon,
        .menu-icon {
            font-size: 20px;
            color: white;
            margin-left: 15px;
            cursor: pointer;
        }

        /* Dropdown เมนู */
        .dropdown-container {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 30px;
            background-color: #444;
            border-radius: 5px;
            width: 150px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
        }

        .dropdown-menu a {
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .dropdown-menu a:hover {
            background-color: #555;
        }

    </style>
</head>

<body>

    <nav>
        <div class="nav-left">
            <span class="nav-item"><a href="/event">กิจกรรม</a></span>
        </div>
        <div class="nav-right">
            <span class="notification-icon">🔔</span>
            <div class="dropdown-container">
                <span class="menu-icon" onclick="toggleDropdown()">☰</span>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="/profileuser">โปรไฟล์</a>
                    <a href="/history">ประวัติ</a>
                    <a href="/create_event">สร้างกิจกรรม</a>
                    <a href="/logout">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // ฟังก์ชั่นสำหรับแสดง/ซ่อนเมนู dropdown
        function toggleDropdown() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            // สลับการแสดง/ซ่อนเมนู
            if (dropdownMenu.style.display === "block") {
                dropdownMenu.style.display = "none";
            } else {
                dropdownMenu.style.display = "block";
            }
        }
    </script>

</body>

</html>

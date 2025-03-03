<?php
$events = $data['events'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>กิจกรรม</title>
    <style>
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
        }

        /* เมนูเลื่อนลง */
        .dropdown-container {
            position: relative;
            /* เพิ่ม container สำหรับ dropdown */
        }

        .dropdown-menu {
            display: none;
            /* ซ่อนเมนูเริ่มต้น */
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
            /* ปรับตำแหน่งเมนูให้อยู่ด้านขวา */
            top: 100%;
            /* ปรับตำแหน่งเมนูให้อยู่ใต้แถบนำทาง */
        }

        .dropdown-container:hover .dropdown-menu {
            display: block;
            /* แสดงเมนูเมื่อ hover ที่ container */
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

        /* กล่องสี่เหลี่ยม */
        .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding: 20px;
        justify-items: center;
        max-height: 720px; /* กำหนดความสูงสูงสุด */
         overflow-y: auto; /* เพิ่มแถบเลื่อนแนวตั้ง */
}

        .grid-item {
            background-color: #ccc;
            /* สีพื้นหลังกล่อง */
            padding: 20px;
            text-align: center;
            width: 300px;
            /* กำหนดความกว้าง */
            height: 300px;
            /* กำหนดความสูง */
            border-radius: 5px;
            /* ทำให้ขอบกล่องโค้งมน */
            transition: transform 0.3s ease; /* เพิ่ม transition */
        }

        .grid-item:hover {
            transform: scale(1.05); /* ขยายขนาดเมื่อ hover */
        }

        /* เพิ่มสไตล์สำหรับไอคอนหัวใจและตัวเลข */
        .grid-item .heart-icon {
            float: right;
            /* จัดไอคอนหัวใจไปทางขวา */
        }

        .grid-item .like-count {
            float: right;
            /* จัดตัวเลขไปทางขวา */
            margin-right: 5px;
            /* ระยะห่างระหว่างตัวเลขกับไอคอน */
        }
        .back-button {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s ease;
    position: fixed; /* เปลี่ยนเป็น position: fixed; */
    left: 20px; /* ปรับตำแหน่งชิดซ้ายของ viewport */
    bottom: 20px; /* ปรับตำแหน่งชิดด้านล่างของ viewport */
}

.back-button:hover {
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
            <div class="search-box">
                <input type="text" placeholder="ค้นหา...">
                <span class="search-icon">🔍</span>
            </div>
            <span class="notification-icon">🔔</span>
            <div class="dropdown-container">
                <span class="menu-icon">☰</span>
                <div class="dropdown-menu">
                    <a href="/profileuser">โปรไฟล์</a>
                    <a href="/event_user">กิจกรรมของฉัน</a>
                    <a href="/list_event">ประวัติ</a>
                    <a href="/create_event">สร้างกิจกรรม</a>
                    <a href="/logout">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="grid-container">
        <?php if (!empty($events)): ?>
            <?php foreach ($events as $event): ?>
                <form method="POST" action="/event">
                    <input type="hidden" name="event_name" value="<?php echo htmlspecialchars($event['eventname']); ?>">
                    <input type="hidden" name="eid" value="<?php echo htmlspecialchars($event['eid']); ?>">
                    <button type="submit" class="grid-item">
                        <h3><?php echo htmlspecialchars($event['eventname']); ?></h3>
                        <span class="like-count"></span>
                        <span class="heart-icon">♡</span>
                    </button>
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p>ไม่มีข้อมูลกิจกรรม</p>
        <?php endif; ?>
    </div>

    <button class="back-button" onclick="window.history.back();">ย้อนกลับ</button>
</body>




</html>
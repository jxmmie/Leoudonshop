<?php
$event = $data['event'];
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดกิจกรรม</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6e6e6e;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 80%;
            height: 700px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
            display: flex;
        }

        .left-side {
            width: 40%;
            text-align: center;
            overflow: auto;
        }

        .right-side {
            width: 60%;
            padding-left: 20px;
            text-align: center;
            /* เปลี่ยนเป็น center */
            overflow: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* เพิ่ม justify-content */
            align-items: center;
            /* เพิ่ม align-items */
        }

        h2 {
            color: #333;
            text-align: center;
            /* เปลี่ยนเป็น center */
        }

        .event-details p {
            font-size: 16px;
            color: #555;
            text-align: left;
            margin-bottom: 10px;
        }

        .event-images img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: 0.3s;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: fit-content;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
        }

        .back-link:hover {
            background-color: #0056b3;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
            /* เด้งขึ้นเล็กน้อย */
        }

        .back-link i {
            margin-right: 8px;
        }

        .back-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: 0.5s;
        }

        .back-link:hover::before {
            left: 100%;
        }

        .btn-enroll {
            display: inline-block;
            padding: 12px 30px;
            background-color: #28a745;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-enroll:hover {
            background-color: #218838;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
            /* เด้งขึ้นเล็กน้อย */
        }

        .btn-enroll:active {
            transform: translateY(0);
            /* กลับสู่ตำแหน่งเดิมเมื่อคลิก */
        }

        .btn-enroll::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: 0.5s;
        }

        .btn-enroll:hover::before {
            left: 100%;
        }

        .hidden-button {
            opacity: 0.5;
            pointer-events: none;
            cursor: not-allowed;
            background-color: transparent;
            border: 1px solid rgba(0, 0, 0, 0.3);
            color: rgba(0, 0, 0, 0.5);
            display: inline-block;
            padding: 12px 30px;
            background-color: #28a745;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 50px;
            border: none;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }

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
    </style>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div class="event-images">
                <?php
                $images = getEventImages($event['eid']);
                if (!empty($images)): ?>
                    <?php foreach ($images as $image): ?>
                        <img src="<?php echo htmlspecialchars($image); ?>" alt="Event Image">
                    <?php endforeach; ?>
                <?php else: ?>
                    <p> ไม่มีรูปภาพกิจกรรม</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="right-side">
            <h2> รายละเอียดกิจกรรม</h2>
            <h3><?php echo htmlspecialchars($event['eventname']); ?></h3>
            <div class="event-details">
                <p><strong>📌วันที่สิ้นสุด:</strong> <?php echo htmlspecialchars($event['date']); ?></p>
                <p><strong>👥 จำนวนผู้เข้าร่วมสูงสุด:</strong> <?php echo htmlspecialchars($event['max_participants']); ?> คน</p>
                <p><strong>📝รายละเอียด:</strong> <?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
                <p><strong>🔵สถานะกิจกรรม:</strong> <?php echo htmlspecialchars($event['statusevent']); ?></p>
            </div>
            <?php if ($event['uid'] == $uid): ?>
                <form action="/detail" method="post">
                    <input type="hidden" name="uid" value="<?= $event['uid'] ?>">
                    <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                    <button type="submit" name="enroll" class="btn-enroll">แก้ไขกิจกรรม</button>
                </form>
            <?php else: ?>
                <form action="/detail" method="post">
                    <input type="hidden" name="uid" value="<?= $uid ?>">
                    <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                    <?php if (isMemberExist($uid, $event['eid'])): ?>
                        <button type="button" class="hidden-button">เข้าร่วมกิจกรรม</button>
                    <?php else: ?>
                        <button type="submit" name="enroll" class="btn-enroll">เข้าร่วมกิจกรรม</button>
                    <?php endif; ?>
                </form>
            <?php endif; ?>
            <a href="/event" class="back-link"><i class="fas fa-arrow-left"></i> กลับไปยังรายการกิจกรรม</a>
        </div>
    </div>
</body>

</html>
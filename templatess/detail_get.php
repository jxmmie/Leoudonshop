<?php
$event = $data['event'];
$uid =  $_SESSION['uid'];
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
            background: linear-gradient(to right,rgb(120, 106, 136),rgb(91, 110, 141));
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
            max-width: 600px;
            width: 90%;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        h2 {
            color: #333;
        }
        .event-details p {
            font-size: 16px;
            color: #555;
            margin: 8px 0;
        }
        .event-images img {
    width: 20%;
    height: 200px; /* กำหนดความสูงที่เท่ากัน */
    object-fit: cover; /* ปรับรูปภาพให้เต็มกรอบโดยไม่เสียสัดส่วน */
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
        }
        .back-link:hover {
            background-color: #0056b3;
        }
        .back-link i {
            margin-right: 8px;
        }
        /* ปรับปุ่มเข้าร่วม */
        .btn-enroll {
            display: inline-block;
            padding: 12px 30px;
            background-color: #28a745; /* สีเขียวสด */
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .btn-enroll:hover {
            background-color: #218838; /* สีเขียวเข้มเมื่อ hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-enroll:active {
            transform: scale(0.98); /* เอฟเฟกต์คลิก */
        }
        .hidden-button {
         opacity: 0.5;  /* ทำให้ปุ่มโปร่งแสง */
           pointer-events: none;  /* ป้องกันการคลิก */
            cursor: not-allowed; /* เปลี่ยนเมาส์เป็นแบบห้าม */
           background-color: transparent; /* ทำให้พื้นหลังใส */
               border: 1px solid rgba(0, 0, 0, 0.3); /* ขอบบางและซีด */
           color: rgba(0, 0, 0, 0.5); /* ทำให้ข้อความซีดลง */
           display: inline-block;
            padding: 12px 30px;
            background-color: #28a745; /* สีเขียวสด */
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}
    </style>
</head>
<body>
<div class="container">
    <h2>📅 รายละเอียดกิจกรรม</h2>
    <h3><?php echo htmlspecialchars($event['eventname']); ?></h3>
    <div class="event-details">
        <p><strong>📌 วันที่สิ้นสุด:</strong> <?php echo htmlspecialchars($event['date']); ?></p>
        <p><strong>👥 จำนวนผู้เข้าร่วมสูงสุด:</strong> <?php echo htmlspecialchars($event['max_participants']); ?> คน</p>
        <p><strong>📝 รายละเอียด:</strong> <?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
        <p><strong>🔵 สถานะกิจกรรม:</strong> <?php echo htmlspecialchars($event['statusevent']); ?></p>
    </div>

    <!-- แสดงหลายๆ รูปภาพ -->
    <div class="event-images">
        <?php
        $images = getEventImages($event['eid']); // ดึงข้อมูลรูปภาพจากฐานข้อมูล
        if (!empty($images)): ?>
            <?php foreach ($images as $image): ?>
                <img src="<?php echo htmlspecialchars($image); ?>" alt="Event Image">
            <?php endforeach; ?>
        <?php else: ?>
            <p>📷 ไม่มีรูปภาพกิจกรรม</p>
        <?php endif; ?>
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
</body>
</html>

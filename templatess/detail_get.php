<?php
$event = $data['event'];
$uid =  $_SESSION['uid'];
$ch = $chk;
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
        .event-image img {
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
        <div class="event-image">
            <?php if (!empty($event['imageurl'])): ?>
                <img src="<?php echo htmlspecialchars($event['imageurl']); ?>" alt="Event Image">
            <?php else: ?>
                <p>📷 ไม่มีรูปภาพกิจกรรม</p>
            <?php endif; ?>
        </div>
       
        <?php if ($event['uid'] == $uid): ?>
            <button type="submit" name="enroll" class="btn-enroll"><a href='/edit_event?eid=<?php echo $event['eid']; ?>' class="signup-link">แก้ไขกิจกรรม</a></button>
        </form>
                <?php else: ?>
                    <form action="/detail" method="post" >
                    <input type="hidden" name="uid" value="<?= $uid ?>">
                    <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                    <?php if ($ch): ?>
                        <button type="submit" name="enroll" class="button-disabled">เข้าร่วมกิจกรรม</button>
                        <?php else: ?>
                            <button type="submit" name="enroll" class="btn-enroll">เข้าร่วมกิจกรรม</button>
                        <?php endif; ?>
        </form>
            <?php endif; ?>
        <a href="/event" class="back-link"><i class="fas fa-arrow-left"></i> กลับไปยังรายการกิจกรรม</a>
    </div>
</body>
</html>

<?php
$event = $data['event'];
$uid = $_SESSION['uid'];
$st = getstats($uid,$event['eid']);
$statusevent = isset($event['statusevent']) ? htmlspecialchars($event['statusevent']) : 'ยังไม่ได้ระบุ';

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

        .button-group {
            display: flex;
            flex-direction: column; /* จัดเรียงปุ่มในแนวตั้ง */
            align-items: center; /* จัดกึ่งกลางปุ่ม */
            margin-top: 15px;
        }

        .btn-enroll,
        .hidden-button,
        .button {
            display: inline-block;
            padding: 12px 30px;
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
            width: fit-content; /* ทำให้ปุ่มปรับขนาดตามเนื้อหา */
        }

        .btn-enroll {
            background-color: #28a745;
            color: white;
        }

        .btn-enroll:hover {
            background-color: #218838;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .btn-enroll:active {
            transform: translateY(0);
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
        }

        .button {
            background-color: #555;
            color: white;
        }

        .button:hover {
            background-color: #777;
        }

        select[name="status"] {
            padding: 10px;
            border-radius: 25px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: #f8f8f8;
            color: #555;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            margin: 10px auto;
        }

        select[name="status"]:focus {
            outline: none;
            border-color: #007BFF;
            background-color: #e6f2ff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .checkin-form {
            margin-top: 15px;
            text-align: center;
        }

        .checkin-form input[type="text"] {
            padding: 10px;
            border-radius: 25px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 10px;
            width: 100%;
            max-width: 300px;
        }

        .checkin-form button[type="submit"] {
            width: 100%;
            max-width: 300px;
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
                <p><strong>สถานะกิจกรรม:</strong> <?php echo $statusevent; ?></p>

                <div class="button-group">
                    <?php if ($event['uid'] == $uid): ?>
                        <form action="/statusevent" method="post" style="width: 100%; max-width: 300px;">
                            <select name="status" required style="width: 100%; margin-bottom: 10px;">
                                <option value="">เลือกสถานะกิจกรรม</option>
                                <option value="กำลังเริ่ม" <?php if ($statusevent == 'กำลังเริ่ม') echo 'selected'; ?>>กำลังเริ่ม</option>
                                <option value="เริ่มแล้ว" <?php if ($statusevent == 'เริ่มแล้ว') echo 'selected'; ?>>เริ่มแล้ว</option>
                                <option value="สิ้นสุดแล้ว" <?php if ($statusevent == 'สิ้นสุดแล้ว') echo 'selected'; ?>>สิ้นสุดแล้ว</option>
                                <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                            </select>
                            <button type="submit" class="btn-enroll" style="width: 100%;">อัปเดตสถานะ</button>
                        </form>
                        <form action="/detail" method="post" style="width: 100%; max-width: 300px;">
                            <input type="hidden" name="uid" value="<?= $event['uid'] ?>">
                            <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                            <button type="submit" name="enroll" class="btn-enroll" style="width: 100%;">แก้ไขกิจกรรม</button>
                        </form>
                        <form action="/list_event" method="post" style="width: 100%; max-width: 300px;">
                            <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                            <button type="submit" name="enroll" class="btn-enroll" style="width: 100%;">ผู้เข้าร่วมกิจกรรม</button>
                        </form>
                    <?php else: ?>
                        <?php if (isMemberExist($uid, $event['eid'])): ?>
                            <button type="button" class="hidden-button" style="width: 100%; max-width: 300px;">เข้าร่วมกิจกรรม</button>
                            <?php if ($st == "อนุมัติ"): ?>
                                <form action="/checkin" method="post" class="checkin-form" style="width: 100%; max-width: 300px;">
                                    <input type="hidden" name="uid" value="<?= $uid ?>">
                                    <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                                    <input type="text" name="cd" placeholder="รหัสเช็คชื่อ">
                                    <button type="submit" name="enroll" class="btn-enroll" style="width: 100%;">เช็คชื่อ</button>
                                </form>
                            <?php elseif($st == "รอดำเนินการ"): ?>
                                <button type="button" class="hidden-button" style="width: 100%; max-width: 300px;">รอดำเนินการ</button>
                            <?php else: ?>
                                <button type="button" class="hidden-button" style="width: 100%; max-width: 300px;">เช็คชื่อแล้ว</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <form action="/detail" method="post" style="width: 100%; max-width: 300px;">
                                <input type="hidden" name="uid" value="<?= $uid ?>">
                                <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                                <button type="submit" name="enroll" class="btn-enroll" style="width: 100%;">เข้าร่วมกิจกรรม</button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <a href="/event" class="back-link"><i class="fas fa-arrow-left"></i> กลับไปยังรายการกิจกรรม</a>
            </div>
        </div>
    </div>
</body>

</html>
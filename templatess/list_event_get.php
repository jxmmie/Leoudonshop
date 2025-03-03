<?php
// เช็คการส่งข้อมูลจาก Controller
$participants = $data['participants']; 
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อผู้เข้าร่วม</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 80%;
            background-color: #333;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .list-container {
            background-color: #444;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #555;
        }
        th {
            text-align: left;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .back-button {
            background-color: #555;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>รายชื่อผู้เข้าร่วม</h2>
    </div>

    <?php if (isset($participants)): ?>
        <div class="list-container">
            <table>
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>วันที่เข้าร่วม</th>
                        <th>สถานะกิจกรรม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $participants->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['f_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['l_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['joindate']); ?></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php elseif (isset($eid)): ?>
        <p>ไม่มีผู้เข้าร่วมกิจกรรมนี้หรือกิจกรรมไม่ถูกต้อง</p>
    <?php endif; ?>

    <button class="back-button" onclick="window.history.back();">ย้อนกลับ</button>
</div>

</body>
</html>

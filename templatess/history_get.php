<?php




$uid = $_SESSION['uid']; 

$result=getEventNameAndStatusByUid($uid)

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
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        border-bottom: 1px solid #555;
        text-align: left; /* จัดตำแหน่งข้อความในคอลัมน์ชิดซ้าย */
        vertical-align: middle; /* จัดตำแหน่งข้อความในแนวตั้งให้อยู่ตรงกลาง */
    }
    th:nth-child(1), td:nth-child(1) {
        width: 60%; /* กำหนดความกว้างของคอลัมน์ "ชื่อกิจกรรม" */
    }
    th:nth-child(2), td:nth-child(2) {
        width: 40%; /* กำหนดความกว้างของคอลัมน์ "สถานะ" */
        text-align: center; /* จัดตำแหน่งข้อความในคอลัมน์ "สถานะ" ให้อยู่ตรงกลาง */
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
        <h2>รายชื่อกิจกรรมที่เข้าร่วม</h2>
    </div>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ชื่อกิจกรรม</th>
                    <th>สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['eventname']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color: red; text-align: center;">ไม่มีกิจกรรมที่เข้าร่วม</p>
    <?php endif; ?>

    <button class="back-button" onclick="window.history.back();">ย้อนกลับ</button>
</div>

</body>
</html>


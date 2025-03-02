<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            background-image: url('img/bg.png');
            /* ใส่ path ของรูปที่ต้องการ */
            background-size: cover;
            /* ให้รูปเต็มพื้นที่ */
            background-position: center;
            /* จัดให้รูปอยู่กลางหน้า */
            background-repeat: no-repeat;
            /* ไม่ให้รูปซ้ำ */
            color: white;
            /* ตัวหนังสือเป็นสีขาว */
            color: white;
            /* ตัวหนังสือเป็นสีขาว */

        }


        .container {
            position: relative;
            max-width: 800px;
            text-align: center;
        }

        .logo {
            position: fixed;
            /* เปลี่ยนจาก absolute เป็น fixed */
            top: 20px;
            left: 20px;
            font-size: 2.5rem;
            /* ขยายตัวอักษรให้ใหญ่ขึ้น */
            font-weight: bold;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
        }


        h1 {
            font-size: 7.5rem;
            /* ขยายตัวอักษรให้ใหญ่ */
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 5px 5px 15px rgb(255, 255, 255);
            /* เพิ่มเงาให้ข้อความ */
            display: inline-block;
            /* ให้ข้อความไม่แยกจากกัน */
            position: relative;
            left: -100px;
            /* ขยับไปทางซ้าย */
        }

        p {
            font-size: 7.5rem;
            /* ขยายขนาดให้ใหญ่มาก */
            font-weight: lighter;
            margin-top: 0;
            /* ทำให้ข้อความอยู่ติดกับ h1 */
            text-shadow: 3px 3px 10px rgb(255, 255, 255);
            display: inline-block;
            /* ให้ข้อความไม่แยกจากกัน */
            position: relative;
            left: 150px;
            /* ขยับไปทางขวา */
            margin-top: -10px;
            /* ให้คำว่า "To" อยู่ใต้ "C" ของ "Welcome" */
        }

        .button-group {
            margin-top: 100px;
            /* เพิ่มระยะห่างจากข้อความ Welcome และ To my project */
            display: flex;
            flex-direction: column;
            /* ทำให้ปุ่มแสดงในแนวตั้ง */
            gap: 20px;
            /* เพิ่มระยะห่างระหว่างปุ่ม */
        }

        .btn {
            display: block;
            width: 300px;
            /* ขยายขนาดของปุ่มให้ใหญ่ขึ้น */
            padding: 18px;
            /* เพิ่ม padding เพื่อให้ปุ่มดูใหญ่ขึ้น */
            margin: 10px auto;
            font-size: 1.8rem;
            /* ขนาดข้อความในปุ่ม */
            font-weight: bold;
            /* เพิ่มความหนาของตัวอักษร */
            color: white;
            background-color:rgb(117, 115, 115);
            /* สีพื้นหลังของปุ่ม */
            border: none;
            border-radius: 40px;
            /* เพิ่มความโค้งมนให้ปุ่ม */
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.2);
            /* เพิ่มเงาให้ปุ่ม */
            transition: background-color 0.3s ease, transform 0.3s ease;
            /* การเปลี่ยนสีเมื่อ hover */
            text-transform: uppercase;
            /* ทำให้ตัวอักษรทั้งหมดเป็นตัวพิมพ์ใหญ่ */
        }

        .btn:hover {
            background-color:rgb(73, 71, 77);
            /* เปลี่ยนสีพื้นหลังเมื่อ hover */
            transform: translateY(-5px);
            /* ให้ปุ่มยกตัวขึ้นเมื่อ hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">MAHASARAKHAM UNIVERSITY</div>
        <h1>Welcome</h1>
        <p>To my project</p>
        <div class="button-group">
            <a href="#" class="btn">เข้าสู่ระบบ</a>
            <a href="#" class="btn">สมัครสมาชิก</a>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
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
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            position: relative;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background: rgba(169, 169, 169, 0.8); /* เปลี่ยนพื้นหลังเป็นสีเทาอ่อน */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #fff;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 1.2rem;
            text-align: left;
            color: #fff;
        }

        input, select {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            border: 1px solid #bbb;
            border-radius: 5px;
            background: linear-gradient(to right, #888, #ddd); /* ไล่เฉดสีจากเทาไปขาว */
            color: #333;
            font-size: 1.2rem;
        }

        input::placeholder {
            color: #666; /* เพิ่มความเข้มของสี placeholder เป็นสีเทาเข้ม */
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        input[type="submit"] {
            width: 100%;
            background: linear-gradient(to right, #888, #ddd); /* ไล่เฉดสีจากเทาไปขาว */
            color: #333;
            font-size: 1.4rem;
            cursor: pointer;
            margin-top: 30px;
            border-radius: 30px;
            padding: 15px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* เพิ่มเงาเบาๆ เพื่อให้ปุ่มดูวาว */
            transition: all 0.3s ease; /* เพิ่มเอฟเฟกต์การเปลี่ยนแปลง */
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #aaa, #fff); /* ไล่เฉดสีเมื่อ hover */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* เพิ่มเงาเมื่อ hover ให้ดูเด่นขึ้น */
            transform: translateY(-5px); /* ให้ปุ่มยกขึ้นเมื่อ hover */
        }

        /* สไตล์สำหรับข้อความเข้าสู่ระบบ */
        .login-link {
            display: block;
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>สมัครสมาชิก</h1>
        <form action="/register" method="post">
            <label for="f_name">ชื่อจริง:</label>
            <input type="text" id="f_name" name="f_name" placeholder="กรุณากรอกชื่อจริงของคุณ" required>

            <label for="l_name">นามสกุล:</label>
            <input type="text" id="l_name" name="l_name" placeholder="กรุณากรอกนามสกุลของคุณ" required>

            <label for="email">อีเมล:</label>
            <input type="email" id="email" name="email" placeholder="กรอกอีเมล เช่น example@example.com" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" placeholder="กรอกรหัสผ่านของคุณ" required>

            <label>เพศ:</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="male" required> ชาย</label>
                <label><input type="radio" name="gender" value="female" required> หญิง</label>
            </div>
            
            <input type="submit" value="สมัครสมาชิก">
        </form>
        
        <!-- เพิ่มลิงก์เข้าสู่ระบบ -->
        <a href="/login" class="login-link">เข้าสู่ระบบ</a>
    </div>
</body>
</html>

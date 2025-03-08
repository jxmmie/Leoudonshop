<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #6e6e6e;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  .container {
    display: flex;
    width: 60%;
    background-color: #333;
    color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    height: 500px;
  }

  .left-panel {
    width: 40%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .right-panel {
    width: 60%;
    padding: 20px;
    display: flex;
    flex-direction: column;
  }

  .image-upload-box {
    width: 300px;
    height: 250px;
    background-color: #444;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
  }

  .image-upload-box img {
    max-width: 100%;
    max-height: 100%;
  }

  .button {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #555;
    color: white;
    transition: background-color 0.3s, box-shadow 0.3s;
    /* เพิ่ม transition ให้การเปลี่ยนแปลงนุ่มนวล */
  }

  .button:hover {
    background-color: #28a745;
    /* สีเขียวเมื่อ hover */
    box-shadow: 0 0 10px 2px rgba(40, 167, 69, 0.7);
    /* แวววาวสีเขียว */
    transform: scale(1.1);
    /* ทำให้ปุ่มขยายขึ้น 10% */
  }

  .button1 {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #555;
    color: white;
    transition: background-color 0.3s, box-shadow 0.3s;
    /* เพิ่ม transition ให้การเปลี่ยนแปลงนุ่มนวล */
  }

  .button1:hover {
    background-color: #0056b3;
    box-shadow: 0 0 15px rgba(0, 123, 255, 0.8);
    /* เพิ่มแสงเรืองเมื่อ hover */
    transform: scale(1.05);
    /* ขยายขนาดเล็กน้อยเมื่อ hover */
  }

  .form-group {
    margin-bottom: 15px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
  }

  .form-group input,
  .form-group textarea {
    width: calc(100% - 22px);
    padding: 10px;
    border: 1px solid #666;
    border-radius: 5px;
    background-color: #444;
    color: white;
  }

  .form-group textarea {
    height: 100px;
  }

  /* Navbar */


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
    margin-left: 15px;
    cursor: pointer;
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

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สร้างกิจกรรม</title>
  <style>
    /* CSS ที่คุณให้มา */
  </style>
</head>
<body>
  <div class="container" style="margin-top: 60px;">
    <div class="left-panel">
      <div class="image-upload-box">
        <img src="your-image.png" alt="Upload Image">
      </div>
      <button class="button1" onclick="window.history.back();">ย้อนกลับ</button>
    </div>
    <div class="right-panel">
      <form id="activityForm" action="/create_event" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="file" name="images[]" id="images" multiple>
        </div>
        <div class="form-group">
          <label for="activityName">ชื่อกิจกรรม</label>
          <input type="text" id="activityName" name="activityName" placeholder="ตั้งชื่อกิจกรรมของคุณ" required>
        </div>
        <div class="form-group">
          <label for="activityDetails">รายละเอียดกิจกรรม</label>
          <textarea id="activityDetails" name="activityDetails" placeholder="รายละเอียดกิจกรรม" required></textarea>
        </div>
        <div class="form-group">
          <label for="participants">จำนวนผู้เข้าร่วม</label>
          <input type="number" id="participants" name="participants" placeholder="จำนวนผู้เข้าร่วม" required>
        </div>
        <div class="form-group">
          <label for="date">วัน/เดือน/ปี ที่สิ้นสุด</label>
          <input type="date" id="date" name="date" required>
        </div>
        <button class="button" type="submit" form="activityForm">สร้างกิจกรรม</button>
      </form>
    </div>
  </div>
</body>
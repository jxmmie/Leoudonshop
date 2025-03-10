
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สร้างกิจกรรม</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #4a4a4a;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      display: flex;
      flex-direction: column;
      width: 60%;
      max-height: 90vh; /* จำกัดความสูง */
      overflow-y: auto; /* เพิ่ม scrollbar ถ้าเนื้อหาเกิน */
      background-color: #2e2e2e;
      color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .left-panel, .right-panel {
      width: 100%;
    }

    .image-upload-box {
      width: 280px;
      height: 240px;
      background-color: #3b3b3b;
      border-radius: 8px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
      border: 2px dashed #777;
    }

    .image-upload-box img {
      max-width: 100%;
      max-height: 100%;
    }

    .button, .button1 {
      padding: 12px 24px;
      margin: 8px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      background-color: #555;
      color: white;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .button:hover {
      background-color: #1e7e34;
      box-shadow: 0 0 12px rgba(40, 167, 69, 0.8);
      transform: scale(1.05);
    }

    .button1:hover {
      background-color: #007bff;
      box-shadow: 0 0 12px rgba(0, 123, 255, 0.8);
      transform: scale(1.05);
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
      width: calc(100% - 20px);
      padding: 12px;
      border: 1px solid #555;
      border-radius: 6px;
      background-color: #3b3b3b;
      color: white;
      font-size: 14px;
    }

    /* ปรับ textarea ให้ขยายอัตโนมัติ */
    textarea {
      min-height: 120px;
      max-height: 300px;
      resize: none;
      overflow-y: auto;
    }

    #add-input, .remove-input {
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      background-color: #666;
      color: white;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    #add-input:hover {
      background-color: #888;
      box-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
    }

    .remove-input {
      background-color: #ff4444;
      margin-left: 10px;
    }

    .remove-input:hover {
      background-color: #cc0000;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <div class="image-upload-box">
        <img src="your-image.png" alt="Upload Image">
      </div>
      <button class="button1" onclick="window.history.back();">ย้อนกลับ</button>
    </div>
    <div class="right-panel">
      <form id="activityForm" action="/create_event" method="post" enctype="multipart/form-data">
        <div id="upload-container">
          <div class="form-group">
            <input type="file" name="images[]" class="images" multiple>
          </div>
        </div>
        <button type="button" id="add-input">เพิ่มช่องอัปโหลด</button>

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

  <script>
    document.getElementById("add-input").addEventListener("click", function() {
      let container = document.getElementById("upload-container");
      let newInput = document.createElement("div");
      newInput.classList.add("form-group");

      newInput.innerHTML = `
        <input type="file" name="images[]" class="images" multiple>
        <button type="button" class="remove-input">ลบ</button>
      `;

      container.appendChild(newInput);

      // เพิ่ม Event ให้ปุ่มลบ
      newInput.querySelector(".remove-input").addEventListener("click", function() {
        container.removeChild(newInput);
      });
    });

    // ปรับ textarea ให้ขยายอัตโนมัติตามเนื้อหา
    document.getElementById("activityDetails").addEventListener("input", function() {
      this.style.height = "auto";
      this.style.height = (this.scrollHeight) + "px";
    });
  </script>
</body>

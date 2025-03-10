<?php
// ฟังก์ชัน getEventById()
$event = $data['event'];

// ตรวจสอบว่ามี eid ใน URL หรือไม่
    if ($event) {
        $activityName = $event['eventname'];
        $activityDetails = $event['description'];
        $participants = $event['max_participants'];
        $date = $event['date'];

    }
?>
<!DOCTYPE html>
<html>
<head>
<title>สร้างกิจกรรม</title>
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
    display: flex;
    width: 80%;
    max-height: 90vh; /* กำหนดความสูงสูงสุด */
    overflow-y: auto; /* เพิ่ม scroll ถ้าข้อมูลเยอะ */
    background-color: #333;
    color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
    width: 100%;
    background-color: #444;
    border-radius: 5px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    gap: 10px;
    padding: 10px;
    overflow-y: auto;
    max-height: 250px; /* จำกัดความสูงของกล่องรูป */
  }

  .image-upload-box img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 5px;
    border: 2px solid white;
  }

  .button {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #555;
    color: white;
    transition: background-color 0.3s;
  }

  .button:hover {
    background-color: #777;
  }

  .form-group {
    margin-bottom: 15px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
  }

  .form-group input, .form-group textarea {
    width: calc(100% - 22px);
    padding: 10px;
    border: 1px solid #666;
    border-radius: 5px;
    background-color: #444;
    color: white;
  }

  /* ทำให้ textarea สามารถขยายขนาดได้ */
  .form-group textarea {
    min-height: 100px;
    max-height: 300px;
    height: auto;
    resize: vertical;
  }

  /* ปุ่มลบกิจกรรม */
  .delete-button {
    background-color: red;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
    width: 40%;
    transition: background-color 0.3s;
  }

  .delete-button:hover {
    background-color: darkred;
  }
</style>
</head>
<body>

<div class="container">
  <div class="left-panel">
    <div class="image-upload-box">
      <?php
      $images = getEventImages($event['eid']);
      if (!empty($images)): 
          foreach ($images as $image): ?>
              <img src="<?php echo htmlspecialchars($image); ?>" alt="Event Image">
              <form action="/delete_image" method="post">
                  <input type="hidden" name="image_path" value="<?php echo htmlspecialchars($image); ?>">
                  <button type="submit" name="delete_image" class="button">ลบรูปภาพ</button>
              </form>
          <?php endforeach; 
      else: ?>
          <p>📷 ไม่มีรูปภาพกิจกรรม</p>
      <?php endif; ?>
    </div>
  </div>

  <div class="right-panel">
    <form action="/uploda" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="hidden" name="eid" value="<?php echo $event['eid']; ?>">
        <input type="file" name="images[]" id="images" multiple>
        <button class="button" type="submit">อัพโหลด</button>
      </div>
    </form>

    <form action="/edit_event" method="post">
      <input type="hidden" name="eid" value="<?php echo $event['eid']; ?>">
      <div class="form-group">
        <label for="activityName">ชื่อกิจกรรม</label>
        <input type="text" id="activityName" name="eventname" placeholder="ตั้งชื่อกิจกรรมของคุณ" value="<?php echo $activityName; ?>">
      </div>
      <div class="form-group">
        <label for="activityDetails">รายละเอียดกิจกรรม</label>
        <textarea id="activityDetails" name="description" placeholder="รายละเอียดกิจกรรม"><?php echo $activityDetails; ?></textarea>
      </div>
      <div class="form-group">
        <label for="participants">จำนวนผู้เข้าร่วม</label>
        <input type="number" id="participants" name="max_participants" placeholder="จำนวนผู้เข้าร่วม" value="<?php echo $participants; ?>">
      </div>
      <div class="form-group">
        <label for="date">วัน/เดือน/ปี ที่สิ้นสุด</label>
        <input type="date" id="date" name="date" value="<?php echo $date; ?>">
      </div>
      <button class="button" type="submit">บันทึกการแก้ไข</button>
    </form>

    <form action="/list_event" method="post">
      <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
      <button type="submit" name="enroll" class="button">ผู้เข้าร่วมกิจกรรม</button>
    </form>

    <form action="/delete_event" method="post" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบกิจกรรมนี้?');">
      <input type="hidden" name="eid" value="<?php echo $event['eid']; ?>">
      <button type="submit" name="delete" class="delete-button">ลบกิจกรรม</button>
    </form>
  </div>
</div>

</body>
</html>

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
    background-color: #333;
    color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    height: 700px;
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
    height: auto;
    background-color: #444;
    border-radius: 5px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); /* ปรับเป็น 2-3 รูปต่อแถว */
    gap: 10px; /* ระยะห่างระหว่างรูป */
    padding: 10px;
    overflow: hidden;
    justify-content: center;
}

.image-upload-box img {
    width: 100px; /* ขนาดรูปภาพ */
    height: 100px;
    object-fit: cover; /* ป้องกันการบิดเบือนของรูป */
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

  .form-group textarea {
    height: 100px;
  }

  /* Navbar Styles (ไม่ต้องแก้ไข) */


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

  .search-icon, .clear-icon {
    margin-left: 5px;
    cursor: pointer;
  }

  .notification-icon, .menu-icon {
    margin-left: 10px;
    cursor: pointer;
  }

  /* Dropdown Styles */
  .dropdown-container {
    position: relative;
  }

  .dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
  }
</style>
</head>
<body>

<div class="container" style="margin-top: 60px;">
<div class="left-panel">
    <div class="image-upload-box">
    <?php
    $images = getEventImages($event['eid']); // ดึงข้อมูลรูปภาพจากฐานข้อมูล
    if (!empty($images)): 
        foreach ($images as $image): ?>
            <img src="<?php echo htmlspecialchars($image); ?>" alt="Event Image">
            <form action="/delete_image" method="post">
                <input type="hidden" name="image_path" value="<?php echo htmlspecialchars($image); ?>"> <!-- Store the image URL for deletion -->
                <button type="submit" name="delete_image" class="btn-enroll">ลบรูปภาพ</button>
            </form>
        <?php endforeach; 
    else: ?>
        <p>📷 ไม่มีรูปภาพกิจกรรม</p>
    <?php endif; ?>
    </div>
</div>


        <button class="button" onclick="window.history.back();">ย้อนกลับ</button>
    </div>
    <div class="right-panel">
    <form action="/uploda" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <input type="hidden" name="eid" value="<?php echo $event['eid']; ?>">
          <input type="file" name="images[]" id="images" multiple>
          <button class="button" type="submit">Upload</button>
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
<form action="/list_event" method="post" >
                        <input type="hidden" name="eid" value="<?= $event['eid'] ?>">
                        <button type="submit" name="enroll" class="btn btn-primary">ผู้เข้าร่วมกิจกรรม</button>
                    </form>
                    <form action="/delete_event" method="post" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบกิจกรรมนี้?');">
            <input type="hidden" name="eid" value="<?php echo $event['eid']; ?>">
            <button type="submit" name="delete" class="delete-button">ลบกิจกรรม</button>
        </form>
    </div>
</div>

</body>
</html>
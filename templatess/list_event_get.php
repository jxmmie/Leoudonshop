<!DOCTYPE html>
<html>
<head>
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
</style>
</head>
<body>

<div class="container">
  <div class="header">
    <h2>รายชื่อผู้เข้าร่วม 21/50</h2>
  </div>
  <div class="list-container">
    <table>
      <thead>
        <tr>
          <th>ชื่อ - นามสกุล</th>
          <th>วัน/เดือน/ปี</th>
          <th>สถานะ</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>ชื่อ - นามสกุล</td>
          <td>วัน/เดือน/ปี</td>
          <td>เข้าร่วมแล้ว</td>
        </tr>
        <tr>
          <td>ชื่อ - นามสกุล</td>
          <td>วัน/เดือน/ปี</td>
          <td>ปฏิเสธการเข้าร่วม</td>
        </tr>
        <tr>
          <td>ชื่อ - นามสกุล</td>
          <td>วัน/เดือน/ปี</td>
          <td>ร้องขอการเข้าร่วม</td>
        </tr>
        <tr>
          <td>ชื่อ - นามสกุล</td>
          <td>วัน/เดือน/ปี</td>
          <td>ปฏิเสธการเข้าร่วม</td>
        </tr>
        <tr>
          <td>ชื่อ - นามสกุล</td>
          <td>วัน/เดือน/ปี</td>
          <td>ปฏิเสธการเข้าร่วม</td>
        </tr>
        <tr>
          <td>ชื่อ - นามสกุล</td>
          <td>วัน/เดือน/ปี</td>
          <td>ปฏิเสธการเข้าร่วม</td>
        </tr>
      </tbody>
    </table>
  </div>
  <button class="back-button">ย้อนกลับ</button>
</div>

</body>
</html>
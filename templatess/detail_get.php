
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
    font-size: 24px;
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
<html>
<head>
    <title><?php echo $event['eventname']; ?></title>
</head>
<body>
    <h1><?php echo $event['eventname']; ?></h1>
    <p><?php echo $event['description']; ?></p>
    <button onclick="window.history.back()">ย้อนกลับ</button>
</body>
</html>

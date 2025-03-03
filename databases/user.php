<?php

function login(String $username, String $password): array|bool
{
    $conn = getConnection();
    $sql = 'select * from user where email = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 0)
    {
        return false;
    }
    $row = $result->fetch_assoc();
    
    if(password_verify($password, $row['password']))
    {
        return $row;
    }else
    {
        return false;
    }
}

function createUser($f_name, $l_name, $email, $password, $gender) {
    $conn = getConnection();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (f_name, l_name, email, password, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $f_name, $l_name, $email, $hashedPassword, $gender);
    return $stmt->execute();
}

function getUserByEmail($email) {
    $conn = getConnection();// ดึงตัวแปร $conn จาก database.php

    if (!$conn) {
        die("Database connection error!");
    }

    $sql = 'SELECT * FROM user WHERE email = ?';
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare statement failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


function logout():void
{
    unset($_SESSION['uid']);
    unset($_SESSION['eid']);
    unset($_SESSION['timestamp']);
}

function getUser(): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'select * from user';
    $result = $conn->query($sql);
    return $result;
}

function getUserById($uid) {
    $conn = getConnection();
    $sql = "SELECT * FROM user WHERE uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

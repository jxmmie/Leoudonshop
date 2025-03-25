<?php
 function createEventmember($uid, $eid) {
    $conn = getConnection();
    $sql = "INSERT INTO event_members (uid, eid) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $uid, $eid);
    return $stmt->execute();
}

function isMemberExist($uid, $eid) {
    $conn = getConnection();
    $sql = "SELECT COUNT(*) FROM event_members WHERE uid = ? AND eid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $uid, $eid);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    return $count > 0 ? true : false;
}


function getParticipants($eid) {
    $conn = getConnection();
    $sql = "SELECT u.l_name,u.f_name, en.status, en.uid, en.eid, joindate
              FROM user u
              INNER JOIN event_members en ON u.uid = en.uid
              WHERE en.eid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function insertCheckCode($eid, $uid) {
    // สร้างการเชื่อมต่อ
    $conn = getConnection();
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $checkCode = '';
    for ($i = 0; $i < 6; $i++) {
        $checkCode .= $characters[random_int(0, strlen($characters) - 1)];
    }
    // SQL เพิ่ม Check Code ลงตาราง event_checkcode
    $sql = "UPDATE event_members SET checkcode = ? WHERE eid = ?  and uid = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sii", $checkCode, $eid, $uid);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    return $checkCode;
}


function getstats($uid, $eid) {
    $conn = getConnection();
    $sql = "SELECT en.status
              FROM user u
              INNER JOIN event_members en ON u.uid = en.uid
              WHERE en.eid = ? AND en.uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $eid, $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    // ใช้ fetch_assoc() เพื่อดึงข้อมูลจาก result
    $row = $result->fetch_assoc();

    // ปิดการเชื่อมต่อ
    $stmt->close();
    $conn->close();

    // ถ้ามีข้อมูล ให้คืนค่าของ status
    if ($row) {
        return $row['status'];
    } else {
        return null; 
    }
}


function getCheckCode($eid, $uid) {
    // สร้างการเชื่อมต่อ
    $conn = getConnection();
    // เตรียมคำสั่ง SQL
    $sql = "SELECT checkcode FROM event_members WHERE eid = ? and uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $eid, $uid);
    $stmt->execute();
    
    // ดึงผลลัพธ์
    $stmt->bind_result($checkCode);
    if ($stmt->fetch()) {
        return $checkCode;
    } else {
        return null; // ถ้าไม่มีข้อมูล
    }

    // ปิดการเชื่อมต่อ
    $stmt->close();
    $conn->close();
}
?>

<?php
 function createEventmember($uid, $eid) {
    if (isMemberExist($uid, $eid)) {
        return false; // ถ้ามีสมาชิกซ้ำแล้วจะไม่เพิ่ม
    }

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
    return $count > 0;
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
?>

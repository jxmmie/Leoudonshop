<?php

function getAllEvents() {
    $conn = getConnection();
    $sql = "SELECT * FROM event";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getEventById($eid) {
    $conn = getConnection();
    $sql = "SELECT * FROM event WHERE eid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function createEvent($uid, $eventname, $max_participants, $description, $image, $statusevent, $date) {
    $conn = getConnection();
    $sql = "INSERT INTO event (uid, date, eventname, max_participants, description, image, statusevent) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $uid, $date, $eventname, $max_participants, $description, $image, $statusevent);
    return $stmt->execute();
}

function getUserEvents($uid) {
    $conn = getConnection();
    $sql = "SELECT * FROM event WHERE uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    $events = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $events;
}

function updateEvent($eid, $eventname, $max_participants, $description, $imageurl, $statusevent) {
    $conn = getConnection();
    $sql = "UPDATE event SET  eventname=?, max_participants=?, description=?, imageurl=?, statusevent=? WHERE eid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssi",  $eventname, $max_participants, $description, $imageurl, $statusevent, $eid);
    return $stmt->execute();
}

function deleteEvent($eid) {
    $conn = getConnection();
    $sql = "DELETE FROM event WHERE eid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eid);
    return $stmt->execute();
}
function searchEvents(string $keyword): array
{
    $conn = getConnection();
    $sql = 'SELECT * FROM event WHERE eventname LIKE ?';
    $stmt = $conn->prepare($sql);
    $keyword = '%' . $keyword . '%';
    $stmt->bind_param('s', $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


?>

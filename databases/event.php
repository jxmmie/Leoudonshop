<?php

function getAllEvents() {
    global $conn;
    $sql = "SELECT * FROM event";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getEventById($eid) {
    global $conn;
    $sql = "SELECT * FROM event WHERE eid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function createEvent($uid, $eventname, $max_participants, $description, $imageurl, $statusevent) {
    global $conn;
    $sql = "INSERT INTO event (uid, createdate, eventname, max_participants, description, imageurl, statusevent) 
            VALUES (?, NOW(), ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isisss", $uid, $eventname, $max_participants, $description, $imageurl, $statusevent);
    return $stmt->execute();
}

function updateEvent($eid, $eventname, $max_participants, $description, $imageurl, $statusevent) {
    global $conn;
    $sql = "UPDATE event SET eventname=?, max_participants=?, description=?, imageurl=?, statusevent=? WHERE eid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssi", $eventname, $max_participants, $description, $imageurl, $statusevent, $eid);
    return $stmt->execute();
}

function deleteEvent($eid) {
    global $conn;
    $sql = "DELETE FROM event WHERE eid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eid);
    return $stmt->execute();
}
?>

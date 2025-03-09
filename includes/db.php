<?php

function getConnection():mysqli
{
    $hostname = '45.64.187.212';
    $dbName = 'leoudons_data2';
    $username = 'leoudons_sever';
    $password = 'Li3YYsId[9h53)';
    $conn = new mysqli($hostname, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

require_once DATABASE_DIR . '/event_member.php';
require_once DATABASE_DIR . '/event.php';
require_once DATABASE_DIR . '/user.php';

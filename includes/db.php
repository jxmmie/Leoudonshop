<?php

function getConnection():mysqli
{
    $hostname = 'localhost';
    $dbName = 'Project';
    $username = 'demo';
    $password = 'abc123';
    $conn = new mysqli($hostname, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


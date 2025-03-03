<?php

$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search)) {
    // ใช้ฟังก์ชัน searchEvents() เพื่อค้นหากิจกรรม
    $events = searchEvents($search);
    renderView('event_get', ['events' => $events, 'search' => $search]);
} else {
    // ถ้าไม่มีคำค้นหา ให้ดึงกิจกรรมทั้งหมด
    $events = getAllEvents();
    renderView('event_get', ['events' => $events]);
}


?>
<?php
$eventid = getEventById($_SESSION['eid']); // เรียกใช้ฟังก์ชัน getAllEvents()

renderView('detail_get',['eventid' => $eventid]);

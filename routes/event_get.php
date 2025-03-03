<?php
$events = getAllEvents();
$search = isset($_GET['search']) ? $_GET['search'] : '';

// กรองข้อมูล
$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search)) {
    $filteredEvents = [];
    foreach ($events as $event) {
        if (strpos(strtolower($event['eventname']), strtolower($search)) !== false) {
            $filteredEvents[] = $event;
        }
    }
    $events = $filteredEvents;
}
renderView('event_get', ['events' => $events, 'search' => $search]);

<?php

$search = isset($_GET['search']) ? $_GET['search'] : '';
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';

if (!empty($search) || (!empty($startDate) && !empty($endDate))) {
    $events = searchEvent($search, $startDate, $endDate);
} else {
    $events = getAllEvents();
}

renderView('event_get', [
    'events' => $events,
    'search' => $search,
    'startDate' => $startDate,
    'endDate' => $endDate
]);

?>
<?php

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$startDate = isset($_GET['startDate']) ? trim($_GET['startDate']) : '';
$endDate = isset($_GET['endDate']) ? trim($_GET['endDate']) : '';

// ตรวจสอบรูปแบบวันที่
if ((!empty($startDate) && !validateDate($startDate)) || (!empty($endDate) && !validateDate($endDate))) {
    die('Invalid date format');
}

// ตรวจสอบว่า endDate ไม่มาก่อน startDate
if (!empty($startDate) && !empty($endDate) && strtotime($startDate) > strtotime($endDate)) {
    die('End date cannot be before start date');
}

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

function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

?>

<?php
$events = getAllEvents();
renderView('event_get',['events' => $events]);

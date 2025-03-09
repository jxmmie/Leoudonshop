<?php
$event = getEventById($_SESSION['eidget']);
renderView('edit_event_get',['event' => $event]); 

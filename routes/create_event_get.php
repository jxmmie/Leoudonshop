<?php
$result = getUserById($_SESSION['uid']);
renderView('create_event_get',['result' => $result]); 

<?php
$participants = getParticipants($_SESSION['eidget']);
renderView('list_event_get', ['participants' => $participants]);
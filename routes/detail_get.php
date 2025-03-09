<?php

  $event = getEventById($_SESSION['eid']);
        renderView('detail_get',['event' => $event]);

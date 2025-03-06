
<?php

$event = getEventById($eid);
$chk = isMemberExist($uid, $eid);
if ($event) {
    // ถ้ามีข้อมูลกิจกรรม
    renderView('detail_get',['event' => $event,'events' => $events],$chk);

} else {
    // ถ้าไม่พบข้อมูล
    echo "ไม่พบกิจกรรมนี้";
    exit();
}

?>
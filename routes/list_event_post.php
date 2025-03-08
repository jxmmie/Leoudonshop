<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eid'])) {
    $eid = $_POST['eid'];
  
    // ดึงข้อมูลผู้เข้าร่วมกิจกรรม
    $participants = getParticipants($eid);
    // ส่งค่า participants ไปยังหน้าที่จะแสดงผล
    
    renderView('list_event_get', ['participants' => $participants]);
    
}
?>

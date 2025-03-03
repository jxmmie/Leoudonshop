<?php
$email = $_POST['email'];
$password = $_POST['password'];
$result = login( $email, $password);
if($result){
    $unix_timestamp = time();
    $_SESSION['timestamp'] = $unix_timestamp;
    $_SESSION['uid'] = $result['uid'];
    $events = getAllEvents();
    renderView('event_get',['events' => $events]);
}else{
    $_SESSION['message'] = 'Email or Password invalid';
    renderView('login_get');
    unset($_SESSION['message']);
    unset($_SESSION['timestamp']);
}



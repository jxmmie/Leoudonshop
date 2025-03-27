<?php

declare(strict_types=1);

function renderView(string $template, array $data = []): void
{
    if ($template !== 'home_get') {
        if($template !== 'login_get'){
            if($template !== 'register_get'){
                if($template !== 'event_scr_get'){
                    include TEMPLATES_DIR . '/header.php';
                    
                }
            }
           
        }
        
    }
    
    if ($template !== 'home_get') {
        if($template !== 'login_get'){
            if($template !== 'register_get'){
                if (!isset($_SESSION['uid'])) {
                    echo "<script>alert('Login ก่อน!'); window.location.href='/login';</script>";
                    exit;
                }
            }
           
        }
        
    }
    
     
    include TEMPLATES_DIR . '/' . $template . '.php';
}
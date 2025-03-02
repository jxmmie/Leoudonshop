<?php

declare(strict_types=1);

function renderView(string $template, array $data = []): void
{
    if ($template !== 'home_get') {
        if($template !== 'login_get'){
            if($template !== 'register_get'){
                include TEMPLATES_DIR . '/header.php';
            }
           
        }
        
    }
    
    include TEMPLATES_DIR . '/' . $template . '.php';
}
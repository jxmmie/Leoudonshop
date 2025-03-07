<?php

declare(strict_types=1);

// Constant values for this project
const INCLUDES_DIR = __DIR__ . '/../includes';
const ROUTE_DIR = __DIR__ . '/../routes';
const TEMPLATES_DIR = __DIR__ . '/../templatess';
const DATABASE_DIR = __DIR__ . '/../databases';
const UPLOADS_DIR = __DIR__ . '/../uploads';

session_start();

// Include router to index.php 
require_once INCLUDES_DIR . '/router.php';
require_once INCLUDES_DIR . '/view.php';
require_once INCLUDES_DIR . '/db.php';


// Call dispatch to handle requests
const PUBLIC_ROUTES = ['/', '/home'];
dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

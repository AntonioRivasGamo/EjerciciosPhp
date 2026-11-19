<?php
declare(strict_types=1);
require_once __DIR__ . '/../app/security.php';
$theme = $_COOKIE["theme"] ?? 'light';
$language = $_COOKIE["language"] ?? 'en';
$elNum = $_COOKIE["elNum"] ?? 10;
if (!is_string($theme) || !in_array($theme, ['light','dark'])) $theme = 'light';
if (!is_string($language) || !in_array($language, ['en','es'])) $language = 'en';
if (!is_numeric($elNum) || !in_array($elNum, [10,20,50])) $elNum = 10;
ini_set('sesion.use_strict_mode', 1);
session_set_cookie_params(
    [
        'httponly' => true,
        'secure' => requestIsHttps(),
        'samesite' => 'lax',
        'path' => '/',
        'lifetime' => 0
    ]
);

session_start();

require_once __DIR__ . '/../assets/langText.php';
require_once __DIR__ . '/../views/navHeader.php';
require_once __DIR__ . '/../app/navigation.php';
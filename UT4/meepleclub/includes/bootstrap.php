<?php
declare(strict_types=1);
require_once __DIR__ . '/security.php';
$theme = $_COOKIE['theme'] ?? 'light';
if (!is_string($theme) || !in_array($theme, ['light', 'dark'])) {
    $theme = 'light';
}
ini_set("session.use_strict_mode",1);
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
<?php
declare(strict_types=1);
require_once __DIR__ . '/../app/security.php';
require_once __DIR__ . '/../app/view.php';
require_once __DIR__ . '/../app/navigation.php';
ini_set('session.use_strict_mode', 1);
session_set_cookie_params([
    'httponly' => true,
    'secure'   => requestIsHttps(),
    'samesite' => 'Lax',
    'path'     => '/',
    'lifetime' => 0,
]);
session_start();

$paginasVisitadas = $_SESSION['paginasVisitadas'] ?? 1;
$ultimaSeccionVisitada = $_SESSION['ultimaSeccionVisitada'] ?? 'Nunca has visitado este sitio antes';
$alias = $_SESSION['alias'] ?? 'desconocido';
$ultimaActividad = date('Y-m-d H:i:s');
$_SESSION['ultimaActividad'] = $ultimaActividad;


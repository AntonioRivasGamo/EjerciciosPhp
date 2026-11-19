<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/bootstrap.php';

if (!isset($_POST["autenticado"])) {
    http_response_code(400);
    exit;
}

$autenticado = $_SESSION['autenticado'];

render('dashboard', [
    'title' => 'Juajandria - Dashboard',
    'name' => $autenticado['name'],
    'email' => $autenticado['email'],
]);
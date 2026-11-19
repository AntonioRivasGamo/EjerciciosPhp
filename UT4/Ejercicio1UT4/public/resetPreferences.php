<?php
require_once __DIR__ . '/../config/bootstrap.php';
foreach ($_COOKIE as $nombre => $valor) {
    setcookie($nombre, '', time() - 3600, '/');
}
redirect('preferences.php');
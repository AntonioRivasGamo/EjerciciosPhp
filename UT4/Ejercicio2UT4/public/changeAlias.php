<?php
require_once __DIR__ . "/../config/bootstrap.php";
if (!isset($_POST['alias']) || !isset($_POST['paginaVolver'])) http_response_code(400);
else {
    $_SESSION['alias'] = e($_POST['alias']);
    $paginaVolver = e($_POST['paginaVolver']);
    redirect($paginaVolver . '.php');
}

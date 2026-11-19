<?php
require_once __DIR__ . '/../app/bootstrap.php';
unset($_SESSION['autenticado']);
session_destroy();
redirect('index.php');
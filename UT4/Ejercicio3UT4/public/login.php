<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/bootstrap.php';

render('login', [
    'title' => 'Juajandria - Login',
    'error' => isset($_SESSION['login_error'])
]);
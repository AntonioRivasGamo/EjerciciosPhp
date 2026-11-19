<?php
require_once __DIR__ . '/../app/bootstrap.php';
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    http_response_code(400);
    exit;
}
$email = $_POST['email'];
$password = $_POST['password'];
$user = findUserByEmail($email, $users);
if ($user === null || !password_verify($password, $user['password_hash'])) {
    $_SESSION['login_error'] = true;
    redirect('login.php');
}
else {
    session_regenerate_id(true);
    $_SESSION['autenticado'] = [
        'email' => $user['email'],
        'name' => $user['name'],
    ];
    redirect('dashboard.php');
}

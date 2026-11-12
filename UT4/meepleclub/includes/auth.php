<?php

function getUsers() :array
{
    return require __DIR__ . '/../data/users.php';
}

function getUserByEmail(string $email) :?array
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) return $user;
    }
    return null;
}

function login(array $user) :void
{
    session_regenerate_id(true);
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'name' => $user['name'],
        'role' => $user['role']
    ];
    $_SESSION['last_activity'] = time();
}

function currentUser() : ?array
{
    if (!isLoggedin()) return null;
    return $_SESSION['user'];
}

function isLoggedIn() : bool
{
    return isset($_SESSION['user']);
}

function requireRole(string $role) :void
{
    $user = currentUser();
    if (!$user && $user['role'] !== $role) {
        http_response_code(403);
        exit('403 - Access denied');
    }
}

function logout() : void
{
    unset($_SESSION['user']);
    session_destroy();
}
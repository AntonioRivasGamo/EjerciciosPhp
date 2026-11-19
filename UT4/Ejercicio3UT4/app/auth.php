<?php

declare(strict_types=1);

function redirect(string $location): never
{
    header('Location: ' . $location);
    exit;
}

function isLoggedIn(): bool
{
    return isset($_SESSION['autenticado']);
}

function findUserByEmail(string $email, array $users): ?array
{
    foreach ($users as $user) {
        if ($user['email'] === $email) return $user;
    }
    return null;
}

function errorMailPassword() :string
{
    unset($_SESSION['login_error']);
    return "El email y/o contraseña son incorrectos";
}
<?php

declare(strict_types=1);

$pageTitle = isset($title) && is_string($title) ? $title : 'UT4';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="theme-">
<header class="site-header">
    <div>
        <a class="brand" href="index.php">Home</a>
        <?php if (isLoggedIn()):?>
            <a class="brand" href="dashboard.php">Dashboard</a>
            <a class="brand" href="logout.php">Logout</a>
        <?php else:?>
            <a class="brand" href="login.php">Login</a>
        <?php endif;?>
    </div>
</header>
<main class="container">

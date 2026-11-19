<?php

declare(strict_types=1);

$pageTitle = isset($title) && is_string($title) ? $title : 'UT4';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> · UT4</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="theme-">
<header class="site-header">
    <div>
        <a class="brand" href="index.php">UT4</a>
    </div>
    <!-- Crear menú de navegación aquí si es necesario -->
</header>
<main class="container">

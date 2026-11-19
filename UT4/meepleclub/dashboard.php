<?php
require_once __DIR__ . '/includes/bootstrap.php';
if (!isLoggedIn()) redirect('login.php');
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="bg-<?= e($theme) ?>">
    <?php meepleHeader($currentUser) ?>
    <h1>Bienvenido al dashboard <?= $currentUser["name"] ?></h1>
    <h2>Rol: <?= $currentUser["role"] ?></h2>
</body>
</html>
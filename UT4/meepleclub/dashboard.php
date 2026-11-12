<?php
require_once __DIR__ . '/includes/bootstrap.php';
if (!isLoggedIn()) redirect('login.php');
$user = $_SESSION['user'];
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
    <h1>Bienvenido al dashboard <?= $user["name"] ?></h1>
    <p>Rol: <?= $user["role"] ?></p>
    <?php if ($user["role"] === "admin") : ?>
    <a href="admin.php"><button>Admin</button></a>
    <?php endif; ?>
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>
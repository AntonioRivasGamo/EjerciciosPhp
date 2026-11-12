<?php
    require_once __DIR__ . '/includes/bootstrap.php';
    requireRole('admin');
    $currentUser = currentUser();
    $users = getUsers();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="bg-<?= e($theme) ?>">
    <h1>Administracion</h1>
    <p>Bienvenido, <?= e($currentUser['name']) ?></p>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>EMAIL</th>
            <th>ROL</th>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= e($user['id']) ?></td>
                <td><?= e($user['name']) ?></td>
                <td><?= e($user['email']) ?></td>
                <td><?= e($user['role']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

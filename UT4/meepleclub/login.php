<?php
require_once __DIR__ . '/includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailInput = $_POST['email'] ?? '';
    $passwordInput = $_POST[ 'password'] ?? '';

    $email = is_string($emailInput) ? trim($emailInput) : '';
    $password = is_string($passwordInput) ? trim($passwordInput) : '';

    $error = 'El email y/o la contraseña no es valido';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $user = getUserByEmail($email);
        if ($user !== null && password_verify($password, $user['password'])) {
            login($user);
            redirect("dashboard.php");
        }
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="bg-<?= e($theme) ?>">
    <h1>Login</h1>
    <?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form name="login" action="" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
    </form>
</body>
</html>

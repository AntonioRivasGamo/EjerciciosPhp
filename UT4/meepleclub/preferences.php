<?php
require_once __DIR__ . '/includes/bootstrap.php';

$allowedTheme = ['light', 'dark'];
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme = $_POST['theme'] ?? '';
    if (!in_array($theme, $allowedTheme)) {
        $error = 'El tema elegido no es valido';
    } else {
        setcookie('theme', $theme, [
            'expires' => time() + (86400 * 30),
            'path' => '/',
            'secure' => requestIsHttps(),
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Meeple Club - Preferencias</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="bg-<?= e($theme) ?>">
    <main>
        <section>
            <h1>Preferencias</h1>
            <?php if (isset($error)): ?>
                <p class="error"><?= e($error) ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <label for="theme">Tema</label>
                <select name="theme" id="theme">
                    <option value="light">Claro</option>
                    <option value="dark">Oscuro</option>
                </select>
                <button type="submit">Guardar preferencias</button>
            </form>
        </section>
        <a class="button" href="index.php">Ir a index</a>
    </main>
</body>
</html>
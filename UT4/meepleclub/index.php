<?php
    require_once __DIR__ . '/includes/bootstrap.php';
    $_SESSION['visitas'] = ($_SESSION['visitas'] ?? 0) + 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Meeple Club</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="bg-<?= e($theme) ?>">
    <main>
        <section>
            <h1>Meeple Club</h1>
            <p>Aplicación para aficionados a los juegos de mesa</p>
        </section>
        <a class="button" href="preferences.php">Ir a preferencias</a>
        <p>Nos han visitado <?= $_SESSION['visitas'] ?> veces</p>
    </main>
</body>
</html>

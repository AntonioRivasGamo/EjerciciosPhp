<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="data:,">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title) ?> · MeepleClub</title>
</head>
<body>
<header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="contact.php">Contacto</a>
        <a href="information.php">Informacion</a>
    </nav>
    <form method="post" action="changeAlias.php">
        <input type="text" name="alias" placeholder="New alias" required>
        <input type="hidden" value="<?= $view === 'home' ? 'index' : e($view) ?>" name="paginaVolver">
        <button type="submit">Update</button>
    </form>
</header>
<?php

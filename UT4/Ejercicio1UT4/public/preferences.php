<?php
require_once __DIR__ . '/../config/bootstrap.php';

?>
<!doctype html>
<html lang=<?= $language ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Principal</title>
    <link href="../assets/style.css" rel="stylesheet">
</head>
<body class="bg-<?= e($theme) ?>">
<?php navHeader($language,$langText); ?>
<form method="post" action="savePreferences.php">
    <label for="language"><?= $langText[$language]['language'] ?>:</label>
    <select name="language" id="language">
        <option value="en"><?= $langText[$language]['en'] ?></option>
        <option value="es"><?= $langText[$language]['es'] ?></option>
    </select>
    <label for="theme"><?= $langText[$language]['theme'] ?>:</label>
    <select name="theme" id="theme">
        <option value="light"><?= $langText[$language]['light'] ?></option>
        <option value="dark"><?= $langText[$language]['dark'] ?></option>
    </select>
    <label for="elNum"><?= $langText[$language]['elNum'] ?>:</label>
    <select name="elNum" id="elNum">
        <option value="10"><?= 10 ?></option>
        <option value="20"><?= 20 ?></option>
        <option value="50"><?= 50 ?></option>
    </select>
    <div>
        <button type="submit"><?= $langText[$language]['submit'] ?></button>
    </div>
</form>
<div>
    <form action="resetPreferences.php" method="get">
        <button type="submit"><?= $langText[$language]['reset'] ?></button>
    </form>
</div>
</body>
</html>

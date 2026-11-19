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
<body class="bg-<?=e($theme)?>">
<?php navHeader($language,$langText); ?>
<h1><?= $langText[$language]['language'] ?>: <?= $language ?></h1>
<h1><?= $langText[$language]['theme'] ?>: <?= $theme ?></h1>
<h1><?= $langText[$language]['elNum'] ?>: <?= $elNum ?></h1>
</body>
</html>
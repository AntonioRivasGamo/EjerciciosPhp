<?php
$name = "EarthBound";
$sales = 658000;
$releasePrice = 69.99;
$stock = 0;
$currentlyInStock = $stock > 0;
$consoleReleases = [
    "Super Nintendo" => 1994,
    "Game Boy Advance" => 2003,
    "Wii U" => 2013,
    "New Nintendo 3DS" => 2016,
    "SNES Classic Edition" => 2017,
    "Nintendo Switch" => 2022
];
$discount = 0;
$currentPrice = $releasePrice - (float)$discount;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $name ?></h1>
    <div>
        <h2>Releases</h2>
        <?php
        foreach ($consoleReleases as $console => $year) {
            echo "<p>$console => $year</p>";
        }
        ?>
    </div>
    <h2>Sales</h2>
    <p><?php echo $sales . " uds"?></p>
    <?php if ($currentlyInStock) {
        echo "<h2>Price<h2>";
        echo "<p>($currentPrice)<p>";
    }else echo "<h3>Out of stock<h3>"?>

</body>
</html>

<?php
/*
1. He utilizado array asociativo porque permite relacionar de forma directa cada plataforma de consola con su correspondiente año de lanzamiento de manera clara y legible.

2. Se ha realizado casting a float utilizando '(float)$discount' para forzar que el descuento sea tratado como un número decimal.

3. Se ha utilizado el operador de comparación '>' en la expresión '$stock > 0'. Evalúa si el stock disponible es superior a cero.

4. Todo el código escrito entre las etiquetas de  PHP.

5. El documento HTML ya procesado por el servidor web.

6. Serviría para gestionar de forma automatizada las dependencias y librerías externas de terceros del proyecto.
*/
?>

<?php
$precioNoche = "72.50";
$numeroNoches = "4";
$descuento = 35;
$gastosGestion = 12.50;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReservIT</title>
</head>
<body>
    <h1>¡Gracias por tu reserva!</h1>
    <div>
    <!-- Numero de noches requiere de una conversion, pues si
         no el orden de los factores al sumarlo puede alterar el producto -->
        <?php
        $numeroNoches2 = (int)$numeroNoches;
        $precioBase = ($precioNoche * $numeroNoches2);
        ?>

        <p><?php echo "Coste inicial: $precioBase €"?></p>
        <p><?php echo "Descuento: - $descuento €"?></p>
        <p><?php echo "Gasto de gestión: $gastosGestion €"?></p>
    </div>
    <h4><?php echo "Total: " . ($precioBase + $gastosGestion - $descuento) . " €"?></h4>
</body>
</html>

<?php
echo var_dump($numeroNoches);
?>
<!-- La variable numeroNoches es string(1)"4" y numeroNoches2 es int(4) -->
<?php
//echo $numeroNoches2 === $numeroNoches;
//echo $numeroNoches == $numeroNoches2;
?>
<!-- El flexible devuelve true, pues los valores se truncan.
     En el caso del estricto, devuelve false, pues el tipo de  las variables no es el mismo-->
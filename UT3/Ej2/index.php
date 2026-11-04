<?php
    function calcularSubtotal(array $componentes) :float {
        $subtotal = 0;
        foreach ($componentes as $componente => $precio) {
            $subtotal += $precio;
        }
        return $subtotal;
    }
    function calcularCostesMontaje(float $subtotal) : float {
        return $subtotal > 1000 ? 0 : 49.99;
    }
    function calcularDescuento(float $subtotal) : float {
        return $subtotal > 1200 ? $subtotal * 0.05 : 0;
    }
    function calcularIVA(float $subtotal,float $montaje , float $descuento) : float {
        return ($subtotal + $montaje - $descuento) * 0.21;
    }
    function calcularTotal(float $subtotal, float $montaje, float $iva, float $descuento) : float {
        return floor(($subtotal + $montaje + $iva - $descuento) * 100) / 100;
    }
?>

<?php
    $componentes = [
        "procesador" => 249.90,
        "placaBase" => 149.50,
        "ram" => 100.01,
        "grafica" => 99.99,
        "ssd" => 79.95,
        "fuente" => 99.90
    ];
    $subtotal = calcularSubtotal($componentes);
    $montaje = calcularCostesMontaje($subtotal);
    $descuento = calcularDescuento($subtotal);
    $iva = calcularIVA($subtotal, $montaje, $descuento);
    $total = calcularTotal($subtotal, $montaje, $iva, $descuento)
    ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ComponentesPC</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Componente</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($componentes as $componente => $precio) {
                echo "<tr><td>$componente</td><td>$precio $</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <h3>Subtotal: <?= $subtotal?> $</h3>
    <h3>Montaje: <?= $montaje ?> $</h3>
    <?php if($subtotal > 1200) echo "<h3>Descuento: $descuento $</h3>"?>
    <h3>IVA: <?= $iva?> $</h3>
    <h1>Total: <?= $total ?> $</h1>
</body>
</html>

<?php
/*
 * 1. ¿Qué ventaja aporta que las funciones devuelvan valores en vez de realizar echo?
 * Al usar funciones con buenos nombres para asignar los valores el codigo se vuelve mucho más legible y mantenible.
 * 2. ¿Qué responsabilidades has separado?
 * He separado calcular el subtotal, calcular el coste de montaje, calcular el descuento, calcular el IVA y calcular el total.
 * 3. Si mañana cambia el precio del montaje, ¿qué parte del programa tendrías que modificar?
 * Solo habria que modificar el precio del montaje en calcularPrecioMontaje.
 */
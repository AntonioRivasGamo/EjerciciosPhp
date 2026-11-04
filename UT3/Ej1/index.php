<?php
    $juegos = [
        [
            "titulo" => "Hades",
            "genero" => "Roguelike",
            "precio" => 24.99,
            "pegi" => 12,
            "stock" => 7
        ],
        [
            "titulo" => "Baldur's Gate 3",
            "genero" => "RPG",
            "precio" => 59.99,
            "pegi" => 18,
            "stock" => 4
        ],
        [
            "titulo" => "Stardew Valley",
            "genero" => "Simulación",
            "precio" => 13.99,
            "pegi" => 7,
            "stock" => 0
        ],
        [
            "titulo" => "Celeste",
            "genero" => "Plataformas",
            "precio" => 19.99,
            "pegi" => 7,
            "stock" => 3
        ],
        [
            "titulo" => "Cyberpunk 2077",
            "genero" => "RPG",
            "precio" => 49.99,
            "pegi" => 18,
            "stock" => 0
        ]
    ];

    $totalJuegosNumero = 0;
    $totalJuegosPrecio = 0;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JuegosLista</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <?php
                $plantilla = $juegos[0];
                foreach ($plantilla as $clave => $valor) {
                    echo "<th>$clave</th>";
                }
                echo "<th>categoria</th>";
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($juegos as $clave => $valor) {
                if($valor["stock"] > 0) {
                    $totalJuegosNumero++;
                    $totalJuegosPrecio += $valor["precio"];
                    echo "<tr>";
                    foreach ($valor as $clave2 => $valor2) {
                        echo "<td>$valor2</td>";
                    }
                    echo $valor["precio"] >= 40 ? "<td>Premium</td>" : "<td>Estándar</td>";
                    echo "</tr>";
                }
            }
        ?>
    </tbody>
</table>
<p>Media de precios: <?= $totalJuegosPrecio / max($totalJuegosNumero, 1) ?></p>
</body>
</html>

<?php
/*
 * 1. ¿Por qué foreach es una buena elección para este problema?
 * For each es una buena elección pues al tratarse de un catalogo la lista puede variar de tamaño al añadirse o quitarse juegos.
 * 2. ¿Qué ocurriría si todos los juegos tuviesen stock 0?
 * Si el stock de todos los juegos fuese 0 ningun juego apareceria en la lista y la media de precios se mostraria en 0.
 * 3. ¿Qué variables has necesitado para calcular la media?
 * Para calcular la media he necesitado totalJuegosPrecio, el total de los precios sumados, y totalJuegosNumero, el numero de juegos en stock.
 */
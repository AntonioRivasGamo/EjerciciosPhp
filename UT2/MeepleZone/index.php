<?php
$nombre = "Dune: Imperium";
$editorial = "Dire Wolf";
$jugadoresMinimos = 1;
$jugadoresMaximos = 4;
$duracionAproximada = (float)"120";
//var_dump($duracionAproximada);
$precioOriginal = (float)"59.95";
$descuento = 10.00;
$stock = (int)"7";
//var_dump($stock);
$disponibleEnTienda = true;

$precioFinal = $precioOriginal - $descuento;
$precioPorJugador = $precioFinal / $jugadoresMaximos;
$disponibilidadStock = $stock > 0;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$nombre?></title>
</head>
<body>
    <h1><?=$nombre?></h1>
    <p>Editorial: <?=$editorial?></p>
    <p>Número de jugadores: <?=$jugadoresMinimos?> - <?=$jugadoresMaximos?> jugadores</p>
    <p>Duración aproximada: <?=$duracionAproximada?> horas</p>
    <p>Precio original: <?=$precioOriginal?>€</p>
    <p>Descuento: -<?=$descuento?>€</p>
    <p>Precio final: <?=$precioFinal?>€</p>
    <p>Precio por jugador aproximado: <?=(int)($precioPorJugador * 100) / 100?>€</p>
    <p>Stock: <?=$stock?></p>
</body>
</html>

<?php
/*
 * Parte 5:
 * $stockOriginal == 7
 * $stockOriginal === 7
 *
 * En el caso del '==' devolverá true, pues el valor se ve truncado y se compara lo que vale, pero no el tipo.
 * En el caso del '===' devolverá false, ya que el '===' compara valor y tipo. Al ser un string y un int la expresion es falsa.
 *
 * Antes de la conversión, el precio original era de tipo string(3)"120" y ahora es float(120).
 * Antes de la conversión, el stock original era de tipo string(1)"7" y ahora es int(7).
 * La expresión que determina si hay stock es una expresión booleana.
 */

$nombreTienda = "MeepleZone";
function mostrarNombreTienda()
{
    global $nombreTienda;
    /*
     * Parte 6:
     * nombreTienda es de ámbito global y se tiene que usar la palabra global para usarla en una función
     * ya que las funciones trabajan por defecto en ámbito local. La solución es declarar la variable global dentro del método.
     */
    echo $nombreTienda;
}

/*
 * Parte 7:
 * A. PHP permite hacer que la página se genere de manera dinámica en el servidor, enviando un html ya construido al navegador.
 *
 * B. El navegador recibe un html ya construido.
 *
 * C. El archivo composer.json sirve para manejar las versiones de las dependencias usadas para el proyecto, para que cuando otra
 * persona descargue el proyecto se instalen las dependencias con la versión especifica que asegura que la aplicación se ejecute sin errores.
 *
 * D. Composer no es imprescindible para ejecutar el index.php, ya que Composer se encarga de evitar errores de ejecución mediante el control de versiones
 * de las dependencias.
 *
 * E. El composer.lock fija la version especifica de las dependencias con las que se ha desarrollado el programa, haciendo que si alguien descargase el código
 * e instalase las dependencias mediante Composer, se instalarían las versiones específicas que aseguran el perfecto funcionamiento del programa.
 * La carpeta vendor/ contiene todas las dependencias que Composer descarga.
 */

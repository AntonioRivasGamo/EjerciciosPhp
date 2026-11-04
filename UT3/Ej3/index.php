<?php
$peliculas = [
    ["titulo" => "Dune", "genero" => "Ciencia ficción", "anio" => 2021, "duracion" => 155],
    ["titulo" => "Interstellar", "genero" => "Ciencia ficción", "anio" => 2014, "duracion" => 169],
    ["titulo" => "Parasite", "genero" => "Drama", "anio" => 2019, "duracion" => 132],
    ["titulo" => "The Batman", "genero" => "Acción", "anio" => 2022, "duracion" => 176],
    ["titulo" => "Whiplash", "genero" => "Drama", "anio" => 2014, "duracion" => 106]
];

$genero = $_GET['genero'] ?? "...";
$duracion = ($_GET['duracion']) ?? "";
$generos = ["..."];

foreach ($peliculas as $pelicula) {
    if (!in_array($pelicula["genero"], $generos)) {
        $generos[] = $pelicula["genero"];
    }
}
?>

<?php
function crearCabezaTabla() :string
{
    global $peliculas;
    $elementosCabeceraTabla = "";
    foreach ($peliculas[0] as $clave => $valor) {
        $elementosCabeceraTabla .= "<th>{$clave}</th>";
    }
    return "<thead>{$elementosCabeceraTabla}</thead>";
}
function crearCuerpoTabla() :string
{
    global $peliculas;
    global $genero;
    global $duracion;
    $elementosBodyTabla = "";
    foreach ($peliculas as $pelicula) {
        if (($genero == "..." || $pelicula["genero"] == $genero) && ($duracion == null || $pelicula["duracion"] == $duracion)){
            $elementosBodyTabla .= "<tr>";
            foreach ($pelicula as $clave => $valor) {
                $elementosBodyTabla .= "<td>{$valor}</td>";
            }
            $elementosBodyTabla .= "</tr>";
        }
    }
    return $elementosBodyTabla == "" ? "" : "<tbody>{$elementosBodyTabla}</tbody>";
}
function buscarPeliculas() :string {
    $cuerpoTabla = crearCuerpoTabla();
    $cabezaTabla = "";
    if ($cuerpoTabla != "") $cabezaTabla = crearCabezaTabla();
    $tabla = $cabezaTabla . $cuerpoTabla;
    return "<table>{$tabla}</table>";
}
?>

<?php

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Game</title>
</head>
<body>
    <form method="get" action="">
        <label for="genero">Genero: </label>
        <select id="genero" name="genero">
            <?php
            foreach ($generos as $gen) {
                echo "<option value=\"{$gen}\">{$gen}</option>";
            }
            ?>
        </select>
        <label for="duracion">Duracion: </label>
        <input type="number"
                id="duracion"
                name="duracion">
        <button type="submit">Buscar</button>
    </form>
    <?= buscarPeliculas() ?>
</body>
</html>

<?php
/*
 * 1. ¿Por qué GET es más apropiado que POST para este caso?
 * Porque con GET la consulta aparece en la URL.
 * 2. ¿Qué ventaja tiene que la consulta aparezca en la URL?
 * El usuario puede orientarse mejor.
 * 3. ¿Qué información procedente del cliente estás validando?
 * Se valida que sea un numero lo introducido en la duracion y que el genero este en la lista.
 */

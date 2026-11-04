<?php
$juegos = [
    [
        "id" => 1,
        "nombre" => "Catan",
        "categoria" => "Estrategia",
        "jugadoresMin" => 3,
        "jugadoresMax" => 4,
        "duracion" => 90,
        "edadMinima" => 10,
        "disponibles" => 2
    ],
    [
        "id" => 2,
        "nombre" => "Azul",
        "categoria" => "Abstracto",
        "jugadoresMin" => 2,
        "jugadoresMax" => 4,
        "duracion" => 45,
        "edadMinima" => 8,
        "disponibles" => 1
    ],
    [
        "id" => 3,
        "nombre" => "Dune: Imperium",
        "categoria" => "Estrategia",
        "jugadoresMin" => 1,
        "jugadoresMax" => 4,
        "duracion" => 120,
        "edadMinima" => 14,
        "disponibles" => 0
    ],
    [
        "id" => 4,
        "nombre" => "Cascadia",
        "categoria" => "Familiar",
        "jugadoresMin" => 1,
        "jugadoresMax" => 4,
        "duracion" => 45,
        "edadMinima" => 10,
        "disponibles" => 3
    ],
    [
        "id" => 5,
        "nombre" => "Terraforming Mars",
        "categoria" => "Estrategia",
        "jugadoresMin" => 1,
        "jugadoresMax" => 5,
        "duracion" => 150,
        "edadMinima" => 12,
        "disponibles" => 1
    ]
];

$categorias = ["..."];
$camposCabezaTabla = ['Nombre', 'Categoria', 'Rango de jugadores', 'Duracion', 'Edad minima', 'Unidades disponibles'];

$numJug = !empty($_GET["numJug"]) ? (int)$_GET["numJug"] : 0;
$durMax = !empty($_GET["durMax"]) ? (int)$_GET["durMax"] : 0;
$categoria = $_GET["categoria"] ?? "...";

$idJuegoReservar = (int)($_POST["idJuegoReservar"] ?? $_GET["idJuegoReservar"] ?? -1);
$juegoReservar = buscarJuegoPorId($idJuegoReservar, $juegos);

$nombre = "";
$email = "";
$edad = 0;

$errores = null;

$reservas = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? "";
    $email = $_POST["email"] ?? "";
    $edad = (int)($_POST["edad"] ?? 0);
    $errores = verificarReserva($nombre, $email, $edad, $juegoReservar);
}

foreach ($juegos as $juego) {
    if (!in_array($juego['categoria'],$categorias)) $categorias[] = $juego['categoria'];
}

function generarCategorias(array $categorias) :string
{
    $categoriasBody = '';
    foreach ($categorias as $categoria) {
        $categoriasBody .= "<option value=\"{$categoria}\">{$categoria}</option>";
    }
    return $categoriasBody;
}

function generarCabezaTabla(array $camposCabezaTabla) :string
{
    $cabezaTabla = "";$numJug = $_GET["numJug"] ?? 0;
    foreach ($camposCabezaTabla as $campo) {
        $cabezaTabla .= "<th>{$campo}</th>";
    }
    $cabezaTabla .= "<th></th>";
    return $cabezaTabla;
}

function generarCuerpoTabla(array $juegos, int $numJug, int $durMax, string $categoria) :string
{
    $cuerpoTabla = "";
    foreach ($juegos as $juego) {
        if (($numJug === 0 || ($numJug <= $juego["jugadoresMax"] && $numJug >= $juego["jugadoresMin"])) && ($durMax === 0 || $durMax >= $juego["duracion"]) && ($categoria === "..." || $categoria === $juego["categoria"]) && $juego["disponibles"] > 0) {
            $cuerpoTabla .= "<tr>
            <td>{$juego['nombre']}</td>
            <td>{$juego['categoria']}</td>
            <td>{$juego['jugadoresMin']} - {$juego['jugadoresMax']}</td>
            <td>{$juego['duracion']} min</td>
            <td>{$juego['edadMinima']}+</td>
            <td>{$juego['disponibles']}</td>
            <td>
                <form method='get' action=''>
                <input type='hidden' name='idJuegoReservar' id='idJuegoReservar' value='{$juego['id']}'>
                <button type='submit'>Reservar</button>
                </form>
            </td>
            </tr>";
        }
    }
    return $cuerpoTabla;
}

function buscarJuegoPorId(int $id, array $juegos) :array
{
    foreach ($juegos as $juego) {
        if ($juego["id"] === $id) {
             return $juego;
        }
    }
    return [];
}

function verificarReserva(string $nombre, string $email, int $edad, array $juego) :array
{
    $errores = [];
    if (empty($juego)) {
        $errores[] = "El juego seleccionado no es válido.";
        return $errores;
    }
    // no se que hay que verificar del nombre, hay humanos que se llaman X Æ A-12 y Po y no les quiero discriminar
    if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) $errores[] = "El email debe ser valido";
    if ($edad < $juego["edadMinima"]) $errores[] = "Eres demasiado joven para comprar este juego";
    if ($juego["disponibles"] === 0) $errores[] = "No quedan unidades";
    return $errores;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<?php if($idJuegoReservar === -1):?>
    <form method="get" action="">
        <label for="numJug">Numero de jugadores: </label>
        <input type="number"
               name="numJug"
               id="numJug">
        <label for="durMax">Duracion maxima: </label>
        <input type="number"
               name="durMax"
               id="durMax">
        <label for="categoria">Categoria: </label>
        <select id="categoria" name="categoria">
            <?= generarCategorias($categorias) ?>
        </select>
        <button command="" type="submit">Submit</button>
    </form>
    <table>
        <thead>
            <?= generarCabezaTabla($camposCabezaTabla) ?>
        </thead>
        <tbody>
            <?= generarCuerpoTabla($juegos, $numJug, $durMax, $categoria) ?>
        </tbody>
    </table>
<?php else:?>
    <a href="?">
        <button type="button">Volver</button>
    </a>
    <h1>Pagina de reserva de <?= htmlspecialchars($juegoReservar["nombre"], ENT_QUOTES, 'UTF-8') ?></h1>
    <?php if ($juegoReservar["disponibles"] !== 0):?>
        <form action="" method="post">
            <label for="nombre">Nombre: </label>
            <input id="nombre"
                   name="nombre"
                   type="text"
                   required>
            <label for="email">Email: </label>
            <input id="email"
                   name="email"
                   type="email"
                   required>
            <label for="edad">Edad: </label>
            <input id="edad"
                   name="edad"
                   type="number"
                   min="1"
                   required>
            <input type="hidden" name="idJuegoReservar" value="<?= $idJuegoReservar ?>">
            <button command="" type="submit">Reservar</button>
        </form>
    <?php else:?>
        <h2>No quedan unidades en stock :(</h2>
    <?php endif;?>
        <?php
            $mensajeError = "";
            if ($errores !== null && sizeof($errores) === 0) {
                $mensajeError = "<p>La reserva se ha completado satisfactoriamente</p>";
                $reservas[] = [
                  "nombre" => $nombre,
                  "email" => $email,
                  "edad" => $edad,
                  "juego" => $juegoReservar
                ];
            } elseif ($errores !== null) {
                foreach ($errores as $error) {
                    $mensajeError .= "<p>{$error}</p>";
                }
            }
        ?>
        <?= $mensajeError ?>
<?php endif; ?>
</body>
</html>

<?php
/*
 * 1. ¿Por qué has utilizado GET para la búsqueda?
 * Para que el usuario se oriente sabiendo que criterios ha usado para buscar los juegos.
 * 2. ¿Por qué POST para la reserva?
 * Porque la reserva contiene datos privados, los cuales no deberian salir en la URL
 * 3. ¿Qué datos recibidos del cliente has tenido que validar?
 * He tenido que validar el juego (para evitar errores que se carguen la aplicacion), la edad, el email y la disponibilidad.
 * 4. ¿Qué diferencia existe entre validar y escapar?
 * Validar revisa si la informacion es correcta y nada mas mientras que escapar transforma caracteres especiales en entidades HTML para interpretarlos de forma segura.
 * 5. ¿Qué responsabilidades has separado en funciones?
 * El verificar la reserva, el buscar por id, generar las categorias del form y generar el cuerpo y la head de la tabla
 * 6. ¿Dónde utilizas arrays multidimensionales?
 * En la lista de juegos inicial y en las reservas.
 * 7. ¿Qué ocurriría si alguien enviase manualmente un ID de juego inexistente?
 * Al verificar la peticion no encontraria el juego y terminaria la verificacion, enviando un mensaje y evitando errores fatales.
 * 8. ¿Qué mejora arquitectónica introducirías si esta aplicación creciese mucho?
 * La organizacion en diferentes paginas con rutas para la reserva.
 */
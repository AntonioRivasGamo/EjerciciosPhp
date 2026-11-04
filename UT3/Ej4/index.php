<?php
$juegosPermitidos = [
    "Catan",
    "Carcassonne",
    "Dune: Imperium",
    "Terraforming Mars"
];
$nivelesPermitidos = [
    "principiante",
    "intermedio",
    "avanzado"
];

$errores = [];

$nombre = "";
$email = "";
$edad = "";
$juegoPrincipal = "";
$nivel = "";
$aceptaNormas = "";

function generarNiveles() :string
{
    global $nivelesPermitidos, $nivel;
    $niveles = "";
    foreach ($nivelesPermitidos as $nivelPermitido) {
        $selected = ($nivelPermitido === $nivel) ? "selected" : "";
        $niveles .= "<option value=\"{$nivelPermitido}\" {$selected}>{$nivelPermitido}</option>";
    }
    return $niveles;
}

function generarJuegos() :string
{
    global $juegosPermitidos, $juegoPrincipal;
    $juegos = "";
    foreach ($juegosPermitidos as $juegoPermitido) {
        $selected = ($juegoPermitido === $juegoPrincipal) ? "selected" : "";
        $juegos .= "<option value=\"{$juegoPermitido}\" {$selected}>{$juegoPermitido}</option>";
    }
    return $juegos;
}

function validar() :bool
{
    global $nombre;
    global $email;
    global $edad;
    global $errores;
    if (strlen($nombre) < 3) {
        $errores[] = "Nombre demasiado corto";
        $nombre = "";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Email invalido";
        $email = "";
    }
    if ($edad < 16) {
        $errores[] = "No cumples la edad minima";
        $edad = "";
    }
    return count($errores) == 0;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $edad = $_POST["edad"] ?? "";
    $juegoPrincipal = $_POST["juego"] ?? "";
    $nivel = $_POST["nivel"] ?? "";
    $aceptaNormas = isset($_POST["normas"]);
}

function escribirRetorno($nombre, $email, $edad, $juegoPrincipal, $nivel) :string
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        return "";
    }

    global $errores;
    $retorno = "";

    if(validar()) {
        $retorno .= "<p>Nombre: {$nombre}</p>";
        $retorno .= "<p>Email: {$email}</p>";
        $retorno .= "<p>Edad: {$edad}</p>";
        $retorno .= "<p>Juego: {$juegoPrincipal}</p>";
        $retorno .= "<p>Nivel: {$nivel}</p>";
        resetValues();
    } else {
        foreach ($errores as $error) {
            $retorno .= "<p style='color: red;'>{$error}</p>";
        }
    }
    return $retorno;
}

function resetValues(): void
{
    global $nombre;
    global $email;
    global $edad;
    global $juegoPrincipal;
    global $nivel;
    global $aceptaNormas;
    $nombre = "";
    $email = "";
    $edad = "";
    $juegoPrincipal = "";
    $nivel = "";
    $aceptaNormas = "";
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
<form method="post" action="">
    <label for="nombre">Nombre:</label>
    <input type="text"
           id="nombre"
           name="nombre"
           value="<?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?>"
           required>

    <label for="email">Email:</label>
    <input type="text"
           id="email"
           name="email"
           value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>"
           required>

    <label for="edad">Edad:</label>
    <input type="number"
           id="edad"
           name="edad"
           value="<?= htmlspecialchars($edad, ENT_QUOTES, 'UTF-8') ?>"
           required>
    <br>

    <label for="juego">Juego:</label>
    <select id="juego" name="juego">
        <?= generarJuegos() ?>
    </select>

    <label for="nivel">Nivel:</label>
    <select id="nivel" name="nivel">
        <?= generarNiveles() ?>
    </select>

    <label for="normas">Normas:</label>
    <input id="normas"
           name="normas"
           type="checkbox"
            <?= $aceptaNormas ?>
           required>

    <button type="submit">Submit</button>
</form>
    <?= escribirRetorno($nombre, $email, $edad, $juegoPrincipal, $nivel) ?>
</body>
</html>

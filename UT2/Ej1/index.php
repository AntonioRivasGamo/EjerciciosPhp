<!--Composer hace que se guarden las dependencias especificas del proyecto para que cuando
    se vuelvan a descargar se descarguen las veriones compatibles-->

<!--Si, es posible, ya que composer solo previene problemas de codigo especificando
    las versiones de cada dependencia.-->

<!--En el servidor se ejecuta todos los fragmentos de codigo php y el navegador recibe el HTML ya construido.-->

<?php
$eventName = "DevDay Madrid";
$place = "Aula Magna";
$price = 25;
$capacity = 120;
$registrations = 87;
$open = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?=$eventName?></title>
</head>
<body>
<h1><?=$eventName?></h1>
<div>
    <p>El evento <?=$eventName?> se celebrara el 31 de abril de 2028 en el <?=$place?>.</p>
    <p>El precio inscripcion es de <?=$price?>€ por persona.</p>
</div>
<h2><?= ($open && ($capacity - $registrations) > 0) ? "¡QUEDAN SOLO " . ($capacity - $registrations) . " PLAZAS!" : "¡SIN PLAZAS DISPONIBLES!" ?></h2>
</body>
</html>
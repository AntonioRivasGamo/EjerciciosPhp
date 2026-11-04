<?php
    echo PHP_VERSION;
    echo "<br>";
    ini_set("display_errors", "1");
    echo ini_get("display_errors");
    echo "<br>";
    echo $_SERVER["REQUEST_METHOD"];
    echo "<br>";
    echo $_SERVER["REQUEST_URI"];

/*
 *1. El archivo php.ini especifica la configuracion que modifica el comportamiento de nuestro código.
 */

/*
 *2. El ini_get() obtiene información del php.ini mientras que el ini_set() establece el valor de las variables del php.ini
 */

/*
 *3. error_reporting(E_ALL) hace que todos los errores del codigo se muestren.
 */

/*
 *4. La configuración del desaroollo puede ser incorrecta en producción hay cosas, como el
 *   mostrar errores, que no deben ser mostradas al cliente.
 */

/*
 *5. $_SERVER Proporciona informacion sobre las variables del entorno del servidor, como la URI o los encabezados.
 */
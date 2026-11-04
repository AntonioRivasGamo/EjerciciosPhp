<?php
$NombreProducto = "Auriculares";
$precio = 80;
$descuento = 15;
$stock = 5;
$precioFinal = $precio - $descuento;
echo "Producto: " . $NombreProducto;
echo "<br>";
echo "Precio final: " . $precioFinal . " €";
var_dump($stock == 5);
var_dump($stock === 5);
function mostrarProducto()
{
    global $NombreProducto;
    echo $NombreProducto;
}
mostrarProducto();

//Faltaba el ';'. Se añadio ';' para solucionarlo 2,5,8
//La variable no tiene el nombre correcto 7
//El operador + no se usa para concatenar, es el operador '.'
//La variable deberia ser int, no string 3,5
//Faltaba declarar como global la variable 14

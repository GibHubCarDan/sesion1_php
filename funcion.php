<?php
function saludar($nombre)
{
    return "Hola, " . $nombre . "!";
}
function sumar($a, $b = 13)
{
    return $a + $b;
}

function multiplicar($a, $b = 13)
{
    return $a + $b;
}


echo saludar("Carlos");
echo "<br>----------------------------------------------------------------<br>";
echo "LA SUMA ES: " . sumar(10) . "<br>";
echo "<br>----------------------------------------------------------------<br>";
echo "LA MULTIPLICACION ES: " . multiplicar(3) . "<br>";
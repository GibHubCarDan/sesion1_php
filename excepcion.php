<?php
function dividir($a, $b)
{
    if ($b === 0) {
        throw new Exception("No se puede dividir por cero.");
    } else {
        return $a / $b;
    }
}
function sumar($a, $b)
{
    return $a + $b;
}
function restar($a, $b)
{
    return $a - $b;
}
function multiplicar($a, $b)
{
    return $a * $b;
}


try {
    echo "LA SUMA ES: " . sumar(10, 5) . "<br>";
    echo "LA RESTA ES: " . restar(10, 5) . "<br>";
    echo "LA MULTIPLICACIÓN ES: " . multiplicar(10, 5) . "<br>";
    echo "La DIVISIÓN ES: " . dividir(10, 5) . "<br>";
    echo "LA DIVISIÓN ES: " . dividir(10, 0);

} catch (Exception $e) {
    echo "Error:" . $e->getMessage();
}






















?>
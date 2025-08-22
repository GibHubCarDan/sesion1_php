<?php
$globalVar = "Soy global";

function prueba()
{
    global $globalVar;// Acceso a la variable global
    echo $globalVar;
}

prueba();
// echo $localVar; ❌ Error: no existe fuera de la función
?>
<?php
function contador()
{
    static $cont = 0;
    $cont++;
    echo "Contador: " . $cont . "<br>";
}
contador();
contador();
contador();
?>
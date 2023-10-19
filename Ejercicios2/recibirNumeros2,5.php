<?php 
    $numeros = $_POST;
    $length = count($numeros)-1;
    sort($numeros);
    echo "Mínimo: $numeros[0], máximo: $numeros[$length]";

?>
<?php 

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacion = $_POST['operacion'];
    echo $operacion;
    if ($operacion=='sumar') {
        echo $num1+$num2;
    } elseif ($operacion=='restar') {
        echo $num1-$num2;
    } elseif ($operacion=='multiplicar') {
        echo $num1*$num2;
    }  else {
        echo $num1/$num2;
    }

?>
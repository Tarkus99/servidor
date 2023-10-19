<?php
    if (isset($_POST['enviar'])) {
        $salir = true;
        $vector = $_POST;
        array_pop($vector);
        foreach ($vector as $key => $value) {
            if (!$value) {
                $salir = true;
            }
        }
        if(!$salir){
            sort($vector);
            $datos = "El mínimo es => $vector[0] y el máximo es =>". $vector[count($vector)-1];
        }else{
            $datos = 'Has dejado un campo vacío';
        }
        include("echo.php");
    } else {
        include("recogerNumero.html");
    }
?>
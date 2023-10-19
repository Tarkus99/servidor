<?php
include("modelo.php");
include("../../inicio.html");
$datos = "";
if (isset($_POST['enviado'])) {
    array_pop($_POST);
    foreach ($_POST as $key => $value) {
        $datos .= $key . '->' . $value . ', ';
    }
    include("echos.php");
} else {
    $ciudad = new SISelect('Desplegable ciudad', 'ciudad', ['alicante' => 'Alicante', 'valencia' => 'Valencia', 'castellon' => 'Castellón'], 1);
    $idioma = new SISelect('Desplegable idioma', 'idioma', ['alto' => 'Alto', 'medio' => 'Medio', 'bajo' => 'Bajo'], 2);
    $sexo = new SIRadio('Seleccionar sexo', 'sexo', ['mujer' => 'Mujer', 'hombre' => 'Hombre'], 0);
    $estado = new SIRadio('Seleccionar estado', 'estado', ['encendido' => 'On', 'apagado' => 'Off'], 0);

    include("formulario.php");
}
include("../../fin.html");

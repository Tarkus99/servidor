<?php
require "modelo.php";
$bd = new Base();
//$datos=Cliente::getAll($bd->link);
if (isset($_POST['enviado'])) {

    $dni = $_POST['dni'];
    $cl = new Cliente($dni);
    $result = $cl->getById($bd->link);
    if (!$result) {
        $datoscliente = array_values($_POST);
        array_pop($datoscliente);
        $cliente = new Cliente(...$datoscliente);
        if ($succes = $cliente->insert($bd->link))
            $mensaje = "Cliente añadido con éxito";
        else
            $mensaje = "Error en la inserción";
    } else {
        $mensaje = "Ya existe un cliente con ese DNI";
    }
    include("echos.php");
} else {
    include("formulario.html");
}

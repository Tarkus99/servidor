<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../VISTAS/inicio.html");
include("../modelo.php");

$bd = new Base();
$cl = new Cliente($_GET['dni']);
$result = $cl->getById($bd->link);
$mensaje = "";

if (isset($_POST['enviado'])) {

    $datoscliente = array_values($_POST);
    array_pop($datoscliente);

    if ($cl->modificar($bd->link, ...$datoscliente))
        $mensaje = "Cliente modificado con éxito";
    else
        $mensaje = "Error en la inserción";
} else
    include("../VISTAS/formularioModificar.php");

include("../echos.php");
include("../VISTAS/fin.html");

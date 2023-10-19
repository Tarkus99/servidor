<?php
include("../VISTAS/inicio.html");
include("../modelo.php");
$dni = $_GET['dni'];
$bd = new Base();
$cl = new Cliente($dni);

$result = $cl->deleteById($bd->link);

if ($result)
    $mensaje = "Eliminado el usuario correctamente.";

include("../echos.php");
include("../VISTAS/fin.html");

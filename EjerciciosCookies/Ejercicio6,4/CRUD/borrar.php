<?php
include("../VISTAS/inicio.html");
include("../modelo.php");
$dni = $_GET['dni'];
$bd = new Base();
$cl = new Cliente($dni);

$result = $cl->deleteById($bd->link);
$_SESSION['nombre'] = null;

if ($result)
    $mensaje = "Eliminado el usuario correctamente.<br><a href='../index.php'>Volver</a>";

include("../echos.php");
include("../VISTAS/fin.html");

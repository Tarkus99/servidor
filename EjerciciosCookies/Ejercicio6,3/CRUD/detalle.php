<?php
include("../VISTAS/inicio.html");
include("../modelo.php");
$dni = $_GET['dni'];
$bd = new Base();
$cl = new Cliente($dni);

$result = $cl->getById($bd->link);
$mensaje = "";
foreach ($result as $key => $value) {
    $mensaje .= "$key: $value<br>";
}

include("../echos.php");
include("../VISTAS/fin.html");

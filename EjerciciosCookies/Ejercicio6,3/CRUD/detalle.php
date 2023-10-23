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
$mensaje .= "<br><a href='../index.php'></a>";
include("../echos.php");
include("../VISTAS/fin.html");

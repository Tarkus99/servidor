<?php
require_once "modelo.php";
$bd = new Base();
if (isset($_COOKIE['nombre'])) {
    $actualUser = $_COOKIE['nombre'];
    $result = Cliente::getAll($bd->link);
    include("VISTAS/verTabla.php");
} else {
    $mensaje = "No estás validado en la aplicación. Por favor valídate en el siguiente enlace.<br><a href='validar.php'>Validar</a>";
    include 'echos.php';
}

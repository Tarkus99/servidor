<?php
include("Modelo.php");
include("../../inicio.html");
$mensaje;

if (isset($_POST['enviado'])) {
    $tipo = $_POST['tipo'];
    $producto;
    if ($tipo == 'disco') {
        $producto = new DiscoDuro($_POST['peso'], $_POST['precio'], $_POST['stock'], $_POST['capacidad']);
    } else {
        $producto = new Monitor($_POST['peso'], $_POST['precio'], $_POST['stock'], $_POST['pulgadas']);
    }
    include("Vistas/mostrar.php");
} else {
    include("Vistas/formulario.php");
}
include("../../fin.html");

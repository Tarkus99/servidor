<?php
session_start();
include 'VISTAS/inicio.html';
spl_autoload_register(function ($clase) {
    include "clases/$clase.php";
});
include 'funciones/funciones.php';
$bd = new Base();
$_SESSION['linea'] = 0;
if (isset($_POST['enviado'])) {
    $newPedido = new Pedido($_POST['idPedido'], $_POST['fecha'], $_POST['dniCliente']);
    if ($newPedido->existe($bd->link)) {
        $mensaje = "Ya existe ese pedido";
    } else {
        $newPedido->guardar();
        $mensaje = "<a href='lineas.php'>Saltar al siguiente paso.</a>";
    }
    include 'VISTAS/mensaje.php';
} else {
    include 'VISTAS/formulario.php';
}
include 'VISTAS/fin.html';

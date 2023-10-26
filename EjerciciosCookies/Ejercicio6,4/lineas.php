<?php
session_start();
spl_autoload_register(function ($clase) {
    include "clases/$clase.php";
});
include 'funciones/funciones.php';
include 'VISTAS/inicio.html';
$bd = new Base();
if (!isset($_SESSION['array_linea'])) {
    $_SESSION['array_linea'] = array();;
}
if (isset($_POST['enviado'])) {
    $_SESSION['linea']++;
    array_push($_SESSION['array_linea'], array(
        'idProducto' => $_POST['idProducto'],
        'cantidad' => $_POST['cantidad'],
        'numLinea' => $_SESSION['linea']
    ));
}
$result = mostrarDetalle();
include 'VISTAS/formularioLinea.php';
include 'VISTAS/fin.html';

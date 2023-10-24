<?php
session_start();
spl_autoload_register(function ($clase) {
    include "clases/$clase.php";
});
include 'funciones/funciones.php';
include 'VISTAS/inicio.html';
$bd = new Base();
if (isset($_POST['enviado'])) {
    if (!isset($_SESSION['array_linea'])) {
        $_SESSION['array_linea'] = array();;
    }
    $_SESSION['linea']++;
    array_push($_SESSION['array_linea'], array(
        'idProducto' => $_POST['idProducto'],
        'cantidad' => $_POST['cantidad'],
        'numLinea' => $_SESSION['linea']
    ));
}
var_dump($_SESSION);

$result = "<tr>";
for ($i = 1; $i <= $_SESSION['linea']; $i++) {
    $result .= '<td>' . $_SESSION['idPedido'] . '</td>';
    $result .= '<td>' . $i . '</td>';
    $result .= '<td>' . $_SESSION['array_linea'][$i]['idProducto'] . '</td>';
    $result .= '<td>' . $_SESSION['array_linea'][$i]['cantidad'] . '</td>';
}
$result .= "</tr>";
include 'VISTAS/formularioLinea.php';

include 'VISTAS/fin.html';

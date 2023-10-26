<?php
session_start();
include 'funciones/funciones.php';
include 'VISTAS/inicio.html';
spl_autoload_register(function ($clase) {
    include "clases/$clase.php";
});
try {
    $bd = new Base();
    $bd->link->beginTransaction();
    $pedido = new Pedido($_SESSION['idPedido'], $_SESSION['fecha'], $_SESSION['cliente']);
    $pedido->insertar($bd->link);
    Linea::insertarTodas($bd->link);
    $bd->link->commit();
    include 'VISTAS/detalleFinal.php';
    session_destroy();
} catch (Exception $e) {
    $bd->link->rollBack();
    $mensaje = $e->getMessage();
    include 'VISTAS/mensaje.php';
}

include 'VISTAS/fin.html';

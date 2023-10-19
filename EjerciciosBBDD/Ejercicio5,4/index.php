<?php
include("modelo.php");
include("inicio.html");
$base = new Base();
$mensaje = "";

if (isset($_POST['enviado'])) {
    $pedido = new Pedido($_POST['idPedido'], $_POST['fecha'], $_POST['dniCliente']);
    $linea = new Linea($_POST['idPedido'], $_POST['idProducto'], $_POST['cantidad']);
    try {
        $base->beginTransaction();
        if (!$pedido->existe($base)) {
            $insertarPedido = $pedido->insertar($base);
            if ($insertarPedido === true)
                $mensaje = "Pedido insertado con éxito\n";
            else
                $mensaje = $insertarPedido;
        }
        $insertarLinea = $linea->insertar($base);
        if ($insertarLinea === true) {
            $mensaje .= "Linea insertada con éxito.";
            $base->commit();
        } else
            $mensaje .= $insertarLinea;
    } catch (Exception $e) {
        $base->rollback();
        $mensaje = $e->getMessage();
    }
    include("echos.php");
} else {
    include("funciones.php");
    include("formulario.php");
}

include("fin.html");

<?php
include("modelo.php");
$base = new Base();
$mensaje = "";
try {
    if (isset($_POST["enviadoLinea"])) {
        $datos = array_values($_POST);
        array_pop($datos);
        $nuevaLinea = new Linea(...$datos);
        if ($nuevaLinea->insertar($base)) {
            $mensaje = "Línea insertada con éxito.";
        };
    } else if (isset($_POST["enviadoPedido"])) {
        $datos = array_values($_POST);
        array_pop($datos);
        $nuevoPedido = new Pedido(...$datos);
        if ($nuevoPedido->existe($base)) {
            $mensaje = "Ese id de pedido ya existe<br>";
        } else {
            if ($nuevoPedido->insertar($base))
                $mensaje = "Pedido insertado con éxito";
        }
    }
} catch (Exception $e) {
    $mensaje = $e->getMessage();
}
include("echos.php");

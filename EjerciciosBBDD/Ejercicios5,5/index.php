<?php
include("modelo.php");
$bd = new Base();
try {
    $pedidos = Pedido::getAll($bd->link);
    include("verTabla.php");
} catch (Exception $e) {
    $mensaje = $e->getMessage();
    include("echos.php");
}


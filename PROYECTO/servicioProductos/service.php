<?php
spl_autoload_register(function ($clase) {
    include "../clases/$clase.php";
});

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $bd = new Base();
    if (isset($_GET['id'])) {
        $producto = new Producto($_GET['id']);
        echo json_encode($producto->getById($bd->link));
    } else {
        echo json_encode(Producto::getAll($bd->link));
    }
}

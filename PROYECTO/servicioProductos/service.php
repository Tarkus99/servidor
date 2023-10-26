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
        $result = Producto::getAll($bd->link);
        $str = "";
        foreach ($result as $item) {
            $str .= "<div class='col-6'>
            <div class='card'>
            <img src='" . $item['foto'] . "' class='card-img-top'>
            <div class='card-body'>
            <h5 class='card-title'>$item[1]</h5>
            <p class='card-text'>" . $item['descripcion'] . "</p>
            <a href='#' class='btn btn-primary'>Go somewhere</a>
            </div>    
            </div>
            </div>";
        }
        echo $str;
    }
}

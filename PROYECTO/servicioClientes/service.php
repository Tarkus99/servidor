<?php
spl_autoload_register(function ($clase) {
    include "../clases/$clase.php";
});
error_reporting(E_ALL);
ini_set('display_errors', 1);

$bd = new Base();
$vector = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode(new Cliente(2, "1234"));
    if (isset($_GET['dni'])) {
        $cl = new Cliente($_GET['dni'], 'Admin');
        $result = $cl->getById($bd->link);
        echo json_encode($result);
    } else {
        echo json_encode(Cliente::getAll($bd->link));
    }
} 



else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$result = $cl->getById($bd->link)) {
        if ($cl->insert($bd->link)) {
            echo json_encode($cl);
        } else {
            echo json_encode(new Cliente(111));
        }
    } 
}

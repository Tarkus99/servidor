<?php
session_start();
spl_autoload_register(function ($clase) {
    include "clases/$clase.php";
});
error_reporting(E_ALL);
ini_set('display_errors', 1);

$bd = new Base();
$vector = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['email'])) {
        $cl = new Cliente($_GET['email'], $_GET['pass']);
        if ($result = $cl->isRegistered($bd->link)) {
            $_SESSION['nombre'] = $result['nombre'];
            $_SESSION['dni'] = $result['dniCliente'];
            echo json_encode($result);
        } else {
            header("HTTP/1.1 400 Bad Request");
            $errorData = array(
                "error" => "Hubo un problema en la solicitud.",
                "detalle" => "Correo electrónico y/o contraseña incorrectos."
            );
            echo json_encode($errorData);
        }
    } else {
        echo json_encode(Cliente::getAll($bd->link));
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cl = new Cliente($vector['email'], $vector['pass'], $vector['dni'], $vector['nombre'], $vector['direccion']);

    $data;
    if ($cl->getByEmail($bd->link)) {
        header("HTTP/1.1 400 Bad Request");
        $data = array(
            "error" => "Hubo un problema en la solicitud.",
            "detalle" => "Ya existe un usuario con ese correo electrónico."
        );
    } else if ($cl->getByDni($bd->link)) {
        header("HTTP/1.1 400 Bad Request");
        $data = array(
            "error" => "Hubo un problema en la solicitud.",
            "detalle" => "Ya existe un usuario con ese DNI."
        );
    } else {
        if ($cl->insert($bd->link)) {
            $data = array(
                "succes" => "Inserción correcta.",
                "detalle" => "Usuario añadido con éxito."
            );
        } else {
            $data = array(
                "error" => "Hubo un problema en la solicitud.",
                "detalle" => "Ha ocurrido un problema durante la inserción."
            );
        }
    }
    echo json_encode($data);
}

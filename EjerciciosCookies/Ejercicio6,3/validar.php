<?php
require 'modelo.php';
require 'VISTAS/inicio.html';
if (isset($_POST["enviado"])) {
    $base = new Base();
    $p = $_POST['password'];
    $cl = new Cliente($_POST['dni'], $p);
    $info = $cl->validar($base->link);
    if ($info) {
        setcookie('nombre', $info['nombre'], 0, '/');
        header('Location: index.php');
    }
} else {
    include("VISTAS/validar.html");
}
include 'VISTAS/fin.html';

<?php
require 'modelo.php';
require 'VISTAS/inicio.html';
if (isset($_POST["enviado"])) {

    $base = new Base();
    $p = $_POST['password'];
    $cl = new Cliente($_POST['dni'], $p);
    $info = $cl->validar($base->link);
    if ($info) {
        echo "dwsw";
        setcookie('nombre', $info['nombre'], 0, '/');
        header('Location: index.php');
    } else {
        $mensaje = "Usuario y contraseña incorrectos.";
    }
}
include 'echos.php';
include("VISTAS/validar.html");
include 'VISTAS/fin.html';

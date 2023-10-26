<?php
session_start();
require 'modelo.php';
require 'VISTAS/inicio.html';
if (isset($_POST["enviado"])) {
    $base = new Base();
    $p = $_POST['password'];
    $cl = new Cliente($_POST['dni'], $p);

    $info = $cl->validar($base->link);
    if ($info) {
        $_SESSION['nombre'] = $info['nombre'];
        header('Location: index.php');
    } else
        $mensaje = "El usuario y contraseña son incorrectos.";
}
include 'echos.php';
include("VISTAS/validar.html");
include 'VISTAS/fin.html';

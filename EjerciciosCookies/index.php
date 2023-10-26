<?php
if (!isset($_COOKIE["nombre"])) {
    if (isset($_POST['enviado'])) {
        if ($_POST['usuario'] == "1" && $_POST['password'] == "1") {
            $nombre = "Paco";
            setcookie("nombre", $nombre, 0, "/");
            echo "Usuario registrado correctamente.";
        } else
            echo "El usuario y contraseña son incorrectos";
    } else {
        include("formulario.html");
    }
} else
    echo "Hola " . $_COOKIE['nombre'];

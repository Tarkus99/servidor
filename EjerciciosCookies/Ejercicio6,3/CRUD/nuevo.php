<?php
include("../VISTAS/inicio.html");
include("../modelo.php");
$bd = new Base();
if (isset($_POST['enviado'])) {

    $cl = new Cliente($_POST['dni'], $_POST['pass'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['admin']);

    if (!$result = $cl->getById($bd->link)) {
        if ($cl->insert($bd->link)) {
            $mensaje = "Cliente añadido con éxito.<br><a href='../index.php'>Volver</a>";
        } else {
            $mensaje = "Error en la inserción";
        }
    } else {
        $mensaje = "El DNI introducido ya existe";
    }
    include("../echos.php");
} else {
    include("../VISTAS/formulario.html");
}
include("../VISTAS/fin.html");

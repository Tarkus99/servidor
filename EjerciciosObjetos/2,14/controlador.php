<?php
$mensaje;
include("clases.php");
include("funciones.php");
include("../../inicio.html");
if (isset($_POST['PrimerFormulario'])) {
    $arrayOpciones = $_POST;
    array_pop($arrayOpciones);
    foreach ($arrayOpciones as $key => $value) {
        $arrayOpciones[$key] = limpiar($value);
    }
    include("vistaSubirFichero.php");

} else if (isset($_POST['SegundoFormulario'])) {
    $imagen = new Imagen($_FILES['file']['tmp_name'], $_FILES['file']['name'], $_FILES['file']['type']);
    $directorio = $_POST['directorio'];
    $defName;
    if ($imagen->esta_cargado()) {
        if ($defName = $imagen->cambiar_nombre($directorio)) {
            crear_directorio($directorio);
            $imagen->mover($defName);
            $mensaje = "Archivo guardaddo con éxito en $defName\n";
        } else
            $mensaje = "Extensión no permitida.\n";
    } else {
        $mensaje = "Error en la subida.\n";
        $mensaje .= "<a href='controlador.php'>Volver a inicio</a>";
    }
    include("echos.php");
} else
    include("vistaOpciones.html");

include("../../fin.html");
?>
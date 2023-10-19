<?php
$mensaje_echo;
include("inicio.html");
include_once("funciones.php");
if (isset($_POST['PrimerFormulario'])) {
      $arrayOpciones = $_POST;
      array_pop($arrayOpciones);
      include("vistaSubirFichero.php");
} elseif (isset($_POST['SegundoFormulario'])) {
      $directorio = $_POST['directorio'];
      $file = $_FILES['file'];

      if (is_uploaded_file($file['tmp_name'])) {
            if ($estado_archivo = estado_archivo($file['name'], $directorio)) {
                  crear_directorio($directorio);
                  move_uploaded_file($file['tmp_name'], $estado_archivo);
                  $mensaje_echo .= 'Archivo subido con éxito';
            } else {
                  $mensaje_echo = 'La extensión del archivo no es compatible.';
            }
      } else {
            $mensaje_echo = 'Error en la subida.';
      }
      $mensaje_echo .= 'Se te redirigirá a la página de opciones en 5 segundos.';
      include("echos.php");
      header("refresh:5; url=controlador.php");
} else {
      include("vistaOpciones.html");
}
include("fin.html");
?>
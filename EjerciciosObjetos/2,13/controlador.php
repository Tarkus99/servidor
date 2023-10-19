<?php
include("clases.php");
include("../../inicio.html");
if (isset($_POST['enviado'])) {
      $datos = $_POST;
      array_pop($datos);

      $item = current($datos);
      $i = 0;
      while ($item = current($datos)) {
            next($datos);
            $i++;
      }

      if ($i < count($datos)) {
            $mensaje = "Hay un campo vacío.<br>";
      } else {
            $miProducto = new Producto($datos['peso'], $datos['precio'], $datos['stock']);
            $mensaje = $miProducto->__toString() . "\nProducto creado correctamente.<br>";
      }
      $mensaje .= "<a href='controlador.php'>Volver</a>";
      include("echos.php");
} else {
      include("formulario.html");
}
include("../../fin.html");

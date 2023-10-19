<?php

$directorio = $_POST['directorio'];
$file = $_FILES['file'];

if (is_uploaded_file($file['tmp_name'])) {
    crear_directorio($directorio);
    if ($estado_archivo = estado_archivo($file['name'], $directorio))
        move_uploaded_file($file['tmp_name'], $estado_archivo);
    else
        echo 'La extensión del archivo no es compatible.';
} else
    echo 'Error en la subida.';
echo 'Se te redirigirá a la página de opciones en 5 segundos.';
header("refresh:5; url=opciones.html");

function crear_directorio($directorio): void
{
    if (!is_dir($directorio)) {
        mkdir($directorio);
    }
}
function estado_archivo($nombreArchivo, $directorio)
{
    //$nombre = $nombreArchivo;
    $partes = explode('.', $nombreArchivo);
    $extension = array_pop($partes);
    //$n_partes = count($partes);
    switch (strtolower($extension)) {
        case 'jpg':
        case 'gif':
        case 'png':
        case 'jpeg':
             if (is_file($directorio . '/' . $nombreArchivo)) {
                /* $nombre = $partes[0];
                for ($i = 1; $i < $n_partes - 1; $i++) {
                    $nombre .= $partes[$i];
                }
                $nombre .= uniqid() . '.' . $partes[$n_partes - 1]; */
                $nombre = implode($partes).'_'.uniqid().'.'.$extension;
            }
            return $directorio . '/' . $nombreArchivo;
        default:
            return false;
    }
}
?>
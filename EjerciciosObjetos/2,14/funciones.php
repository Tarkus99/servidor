<?php
function limpiar($str): string
{
    return htmlspecialchars(trim($str));
}

function lista($nombre, $array): string
{
    $contador = 0;
    $string = "<select name='$nombre'>";
    foreach ($array as $value) {
        if (!empty($value)) {
            $string .= "<option value='$value'>$value<option/>";
            $contador++;
        }
    }
    if ($contador == 0)
        return false;
    else
        return $string .= '</select><br><br>';
}

function crear_directorio($directorio): void
{
    if (!is_dir($directorio)) {
        mkdir($directorio);
    }
}

function estado_archivo($nombreArchivo, $directorio)
{
    $partes = explode('.', $nombreArchivo);
    $extension = array_pop($partes);
    switch (strtolower($extension)) {
        case 'jpg':
        case 'gif':
        case 'png':
        case 'jpeg':
            $nombreArchivo = implode('.', $partes);
            if (is_file($directorio . '/' . $nombreArchivo.'.'.$extension)) {
                $nombreArchivo .= '_' . uniqid();
            }
            $nombreArchivo .= '.' . $extension;
            return $directorio . '/' . $nombreArchivo;
        default:
            return false;
    }
}
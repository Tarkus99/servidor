<?php
function limpiar($str): string
{
    return htmlspecialchars(trim($str));
}

function lista($nombre, $array): string
{
    $string = "<select name='$nombre'>";
    foreach ($array as $value) {
        $i = limpiar($value);
        if ($i)
            $string .= "<option value='$i'>$i<option/>";
    }
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
                $nombre = implode($partes) . '_' . uniqid() . '.' . $extension;
            }
            return $directorio . '/' . $nombreArchivo;
        default:
            return false;
    }
}
?>
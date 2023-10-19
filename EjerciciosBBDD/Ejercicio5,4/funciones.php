<?php

function lista($con, $tabla, $clave, $nombre): string
{
    $result = $tabla::getAll($con);
    $str = "<select name='$clave'>";
    while ($f = $result->fetch(PDO::FETCH_BOTH)) {
        $str .= "<option value='$f[0]'>$f[1]</option>";
    }
    $str .= "</select><br>";
    return $str;
}

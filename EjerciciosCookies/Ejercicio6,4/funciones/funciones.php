<?php function lista($con, $tabla, $clave, $nombre): string
{
    $query = "SELECT $clave, $nombre FROM $tabla";
    $result = $con->prepare($query);
    $result->execute();
    $str = "<select name='$clave'>";
    while ($f = $result->fetch(PDO::FETCH_BOTH)) {
        $str .= "<option value='$f[0]'>$f[1]</option>";
    }
    $str .= "</select><br>";
    return $str;
}

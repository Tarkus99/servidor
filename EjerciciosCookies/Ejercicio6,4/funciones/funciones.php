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

function mostrarDetalle(): string
{
    $str = "";

    foreach ($_SESSION['array_linea'] as $item) {
        $str .= "<tr>";
        $str .= "<td>" . $_SESSION['idPedido'] . "</td>";
        $str .= "<td>" . $item['numLinea'] . "</td>";
        $str .= "<td>" . $item['idProducto'] . "</td>";
        $str .= "<td>" . $item['cantidad'] . "</td>";
        $str .= "</tr>";
    }
    return $str;
}

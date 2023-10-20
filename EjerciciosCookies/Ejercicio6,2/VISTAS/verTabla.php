<?php include("inicio.html"); ?>
<h1>Bienvenido <?= $actualUser; ?></h1>
<table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>NOMBRE</th>
            <th></th>
            <th></th>
            <th><a href="CRUD/nuevo.php">NUEVO</a></th>
        </tr>
    </thead>
    <?php
    while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
        $dni = $fila['dniCliente'];
        $nombre = $fila['nombre'];
        echo
        "<tr>
                <td>$dni</td>
                <td>$nombre</td>
                <td><a href='CRUD/modificar.php?dni=$dni'>modificar</a></td>
                <td><a href='CRUD/borrar.php?dni=$dni'>borrar</a></td>
                <td><a href='CRUD/detalle.php?dni=$dni'>detalle</a></td>
            </tr>";
    }
    ?>
</table><br>
<?php include("fin.html"); ?>
<table style="text-align: center;">
    <thead>
        <tr>
            <th>Pedido</th>
            <th>NLinea</th>
            <th>producto</th>
            <th>cantidad</th>
        </tr>
    </thead>
    <?php echo $result ?>
    <form action="" method="post">
        <tr>
            <td><?php $_SESSION['idPedido'] ?></td>
            <td><?php $_SESSION['linea'] ?></td>

            <td><?php echo lista($bd->link, 'productos', 'idProducto', 'nombre') ?></td>
            <td>
                <input type="number" name="cantidad" required />
                <input type="submit" name="enviado" value="continuar" />
            </td>
        </tr>
    </form>
</table><br>
<a href='terminar.php'>Terminar</a>
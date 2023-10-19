<form action="" method="post">
    Datos del pedido<br>
    <input type="number" name="idPedido" /><br><br>
    <input type="date" name="fecha" /><br><br>
    <?= lista($base->link, 'Cliente', 'dniCliente', 'nombre'); ?><br>

    Datos de la línea<br>
    <?= lista($base->link, 'Producto', 'idProducto', 'nombre'); ?><br>
    <input type="number" name="cantidad" /><br><br>
    <input type="submit" name="enviado" value="ENVIAR" />
</form>
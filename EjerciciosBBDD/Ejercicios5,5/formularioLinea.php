<form action="insertar.php" method="post">
    ID PEDIDO: <?= $id; ?><br><br>
    <input type="hidden" name="idPedido" value="<?= $id; ?>" />
    Seleccionar producto:<br>
    <?= lista($base->link, 'productos', 'idProducto', 'nombre') ?><br>
    Cantidad:<br>
    <input type="number" name="cantidad" />
    <input type="submit" name="enviadoLinea" value="ENVIAR" />
</form>
<form action="insertar.php" method="post">
    ID PEDIDO:<br>
    <input type="number" name="idPedido" /><br>
    Fecha:<br>
    <input type="date" name="fecha" /><br>
    Dirección Entrega:<br>
    <input type="text" name="dirEntrega" /><br>
    Número de la tarjet:<br>
    <input type="text" name="nTarjeta" /><br>
    Fecha caducidad:<br>
    <input type="date" name="fechaCaducidad" /><br>
    Matricula repartidor:<br>
    <input type="text" name="matriculaRepartidor" /><br>
    Clientes:<br>
    <?= lista($base->link, 'clientes', 'dniCliente', 'nombre') ?><br>
    <input type="submit" name="enviadoPedido" value="ENVIAR" />
</form>
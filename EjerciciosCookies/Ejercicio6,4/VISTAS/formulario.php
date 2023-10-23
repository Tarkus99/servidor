<form action="" method="post">
    ID PEDIDO: <input type="number" name="idPedido" /><br>
    FECHA: <input type="date" name="fecha" /><br>
    CLIENTE: <?php echo lista($bd->link, 'clientes', 'dniCliente', 'nombre') ?><br>
    <input type="submit" name="enviado" value="ENVIAR" />
</form>
<form action="controlador.php" method="post">
<h3>Rellena el formulario</h3>

<p>Peso del producto(kg)</p>
<input type="text" name="peso" />
<p>Precio del producto(€)</p>
<input type="text" name="precio" />
<p>Stock</p>
<input type="number" name="stock" />

<p>Pulgadas</p>
<input type="number" name="pulgadas" />

<p>Capacidad</p>
<input type="number" name="capacidad" />

<select name="tipo">
    <option value="disco">Disco duro</option>
    <option value="monitor">Monitor</option>
</select>

<input type="submit" name="enviado" value="ENVIAR" />
</form>
<form action="" method="post">
    DNI: <h3><?php echo $_GET['dni'] ?></h3><br>
    Nombre:<br>
    <input type="text" name="nombre" value="<?= $result['nombre'] ?>" /><br>
    Direccion:<br>
    <input type="text" name="direccion" value="<?= $result['direccion'] ?>" /><br>
    e-Mail:<br>
    <input type="text" name="email" value="<?= $result['email'] ?>" /><br>
    Contraseña:<br>
    <input type="password" name="pass" /><br>
    Eres administrador:<br>
    <input type="radio" name="admin" value="true">SÍ<br>
    <input type="radio" name="admin" value="false" checked>NO<br>
    <input type="submit" name="enviado" value="ENVIAR" />
</form>
<form action="controlador.php" method="POST" enctype="multipart/form-data">
      <?= lista('directorio', $arrayOpciones); ?>
      Fichero a subir:
      <input type="file" name="file" /><br><br>
      <input type="submit" value="ENVIAR" name="SegundoFormulario" />
</form>
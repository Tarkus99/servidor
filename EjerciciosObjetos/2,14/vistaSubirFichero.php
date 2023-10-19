<?php 
$flag = lista('directorio', $arrayOpciones);
if($flag){
?>
<form action="controlador.php" method="POST" enctype="multipart/form-data">
    <?= $flag; ?>
    Fichero a subir:
    <input type="file" name="file" /><br><br>
    <input type="submit" value="ENVIAR" name="SegundoFormulario" />
</form>
<?php
 }else{
      echo "No has introducido ningún directorio";
 } ?>
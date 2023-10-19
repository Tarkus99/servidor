<?php 
    /* $arrayOpciones = array_values($_POST);
    for ($i=0; $i < count($arrayOpciones); $i++) { 
        $arrayOpciones[$i] = limpiar($arrayOpciones[$i]);
    } */

    $arrayOpciones = $_POST;
    //array_pop($arrayOpciones);
    foreach($arrayOpciones as $clave => $elemento){
        $arrayOpciones[$clave]=limpiar($elemento);
    }

    function limpiar($str) : string{
        return htmlspecialchars(trim($str));
    }

    function lista($nombre, $array) : string{
        $string = "$nombre<select name='$nombre'>";
        foreach($array as $value){
            if ($value) 
                $string.="<option value='$value'>$value<option/>";
        }
        $string.='</select><br><br>';
        return $string;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="subir.php" method="POST" enctype="multipart/form-data">
    <?=lista('directorio', $arrayOpciones);?>
    Fichero a subir:
    <input type="file" name="file"/><br><br>
    <input type="submit" value="ENVIAR"/>
    </form>
</body>
</html>

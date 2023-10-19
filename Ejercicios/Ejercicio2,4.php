<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $nombre = ' Juan Carlos ';
        $nombreMod = trim($nombre);
        echo '<h3>'.$nombre.'</h3>';
        echo '<h3>'.$nombreMod.'</h3><br>';

        $longNombre = strlen($nombre);
        echo '<h3>'.$longNombre.' carácteres</h3><br>';

        $nombreMay = strtoupper($nombre);
        echo '<h3>'.$nombreMay.'</h3>';

        $nombreMin = strtolower($nombre);
        echo '<h3>'.$nombreMin.'</h3><br>';

        $prefijo = 'ju';
        echo '<h3>Prefijo'.$prefijo.'</h3>';
        $posicion = strpos($nombreMod, $prefijo);
        echo '<h3>strpos: '.$posicion.'</h3><br>';

        $a = substr_count($nombreMod, strtolower("A"));
        echo '<h3>strpos: '.$a.'</h3><br>';

        $b = stripos($nombreMod, strtolower("A"))
    
    ?>
</body>
</html>
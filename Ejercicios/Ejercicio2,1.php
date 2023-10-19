<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 2.1</h1>
    <?php
        $numero = 5;
        $resultado = $numero;
        for ($i=$numero; $i > 1 ; $i--) { 
            $resultado*=$i-1;
        }
    ?>
    <h3>Factorial de <?=$numero?> = <?=$resultado?></h3>
</body>
</html>
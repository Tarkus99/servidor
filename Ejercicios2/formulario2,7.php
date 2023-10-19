<?php 

    if(isset($_POST['enviado'])){
        $numeros = array_slice($_POST, 0, count($_POST)-1);
        $length = count($numeros)-1;
        sort($numeros);
        echo "Mínimo: $numeros[0], máximo: $numeros[$length]";
    }else{ ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <p>Escribe el 1er número:</p>
        <input type="number" name="num1"/>
        <p>Escribe el 2o número:</p>
        <input type="number" name="num2"/>
        <p>Escribe el 3er número:</p>
        <input type="number" name="num3"/>
        <input type="submit" value="enviar" name="enviado"/>
    </form>
</body>
</html>
    <?php }?>


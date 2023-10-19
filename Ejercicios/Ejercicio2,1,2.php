<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 2.1.2</h1>
    <?php 
        $a = 15;
        $b = -5;
        $c = 8;

        $maximo = $a;
        $minimo = $a;

        if ($b>$maximo) {
            $maximo = $b;
        }elseif($c>$maximo){
            $maximo = $c;
        }

        if ($b<$minimo) {
            $minimo = $b;
        }elseif($c<$minimo){
            $minimo = $b;
        }
    ?>
    <h2>Números: <?=$a.', '.$b.', '.$c?></h2>
    <h3>Máximo: <?=$maximo?>, mínimo: <?=$minimo?></h3>
</body>
</html>
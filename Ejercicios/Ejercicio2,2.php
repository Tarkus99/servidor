<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 2.2</h1>
    <?php 
        $a = 5;
        $b = -5;
        $c = 1;

        $aux1 = null;
        $aux2 = null;
        $aux3 = null;

        if ($a<$b) {
            if ($b<$c) {
                $aux1 = $a;
                $aux2 = $b;
                $aux3 = $c;
            }elseif($c<$a){
                $aux1 = $c;
                $aux2 = $a;
                $aux3 = $b;
            }else{
                $aux1 = $a;
                $aux2 = $c;
                $aux3 = $b;
            }
        }elseif($a<$c){
                $aux1 = $b;
                $aux2 = $a;
                $aux3 = $c;
        }elseif($b<$c){
            $aux1 = $b;
            $aux2 = $c;
            $aux3 = $c;
        }else{
            $aux1 = $c;
            $aux2 = $b;
            $aux3 = $a;
        }
    ?>
    <h3>Números ordenados: <?=$aux1.', '.$aux2.', '.$aux3?></h3>
</body>
</html>
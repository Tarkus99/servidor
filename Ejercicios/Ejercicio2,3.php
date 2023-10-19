
<?php 
    $nombres =array('JoseLuisa', 'Ivana', 'Gabriel', 'Pedri', 'Haaland', 'Bellingham', 'Mbappé');
    echo '<h3>Número de elementos del array: '.count($nombres).'</h3><br>';

    $string = implode(' ', $nombres);
    echo $string.'<br>';

    $arrayAux = $nombres;
    $string = "";
    sort($arrayAux,SORT_STRING);
    $string = implode(' ', $arrayAux);
    echo $string.'<br>';

    $string = "";
    $arrayAux = array_reverse($nombres);
    $string = implode(' ', $arrayAux);
    print_r($arrayAux);
    echo $string.'<br>';

    $pos = array_search('Gabriel', $nombres);
    echo $pos;

    $arrayMulti = array(
        array('ID'=>1, 'Nombre'=>'Gabriel', 'Edad'=>24),
        array('ID'=>2, 'Nombre'=>'Haaland', 'Edad'=>22),
        array('ID'=>3, 'Nombre'=>'Pedri', 'Edad'=>20),
        array('ID'=>4, 'Nombre'=>'Juan', 'Edad'=>34),
        array('ID'=>5, 'Nombre'=>'Lucas', 'Edad'=>19)
    );

    echo '<table border="1">';
    foreach ($arrayMulti as $alumno) {
        $ID = $alumno['ID'];
        $nombre = $alumno['Nombre'];
        $edad = $alumno['Edad'];
        echo "<tr><th>$ID</th><th>$nombre</th><th>$edad</th></tr>";
    }
    echo '</table>';

    $arrayAux = array_column($arrayMulti, 'Nombre', 'Nombre');
    $string = implode(' ',$arrayAux);
    echo $string.'<br>';

    $arrayNum = array(7,2,643,9,12,7,32,8,1,23);
    $sum = array_sum($arrayNum);
    echo $sum;

?>


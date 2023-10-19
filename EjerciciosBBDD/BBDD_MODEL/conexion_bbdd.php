<?php
$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true
);
$con = new PDO(
    'mysql:host=localhost;dbname=virtualmarket',
    'root',
    '',
    $opciones
);


$result = $con->prepare('SELECT * FROM productos');
$result->execute();

while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
    echo $fila['nombre'] . "<br>";
}

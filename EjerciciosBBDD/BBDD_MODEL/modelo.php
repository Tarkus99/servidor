<?php
class Base {
    private $link;
    function __construct(){
        try{
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            );
            $this->link = new PDO('mysql:host=localhost;dbname=virtualmarket', 'root', '',
            $opciones); 
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    function __get($var){
        return $this->$var;
       }
}
Class Producto{
    private $nombre;
    static function getAll($con){
        $result = $con->prepare('SELECT * FROM productos');
        $result->execute();
        return $result;
    }
}

Class Cliente{
    private $nombre;
    static function getAll($con){
        $result = $con->prepare('SELECT * FROM clientes');
        $result->execute();
        return $result;
    }
}
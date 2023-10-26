<?php
include '../config/config.php';
class Base
{
    private $link;
    function __construct()
    {
        try {
            $this->link = new
                PDO(
                    "mysql:host=" . HOST . ";dbname=" . BASE,
                    USUARIO,
                    PASS,
                    OPCIONES
                );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function __get($var)
    {
        return $this->$var;
    }
}

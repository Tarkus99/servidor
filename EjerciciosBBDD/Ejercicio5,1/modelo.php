<?php
class Base
{
    private $link;
    function __construct()
    {
        try {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            );
            $this->link = new PDO(
                'mysql:host=localhost;dbname=virtualmarket',
                'root',
                '',
                $opciones
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
class Producto
{
    private $nombre;
    static function getAll($con)
    {
        $result = $con->prepare('SELECT * FROM productos');
        $result->execute();
        return $result;
    }
}

class Cliente
{
    private $nombre;
    private $email;
    private $dni;
    private $pass;
    private $direccion;
    private $isAdmin;

    public function __construct($dni = null, $nombre = null, $direccion = null, $email = null, $pass=null, $isAdmin=null)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->pass = $pass;
        $this->isAdmin = $isAdmin;
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __set($name, $value)
    {
        if (property_exists(__CLASS__, $name)) {
            $this->name = $value;
        }
    }

    static function getAll($con)
    {
        $result = $con->prepare('SELECT * FROM clientes');
        $result->execute();
        return $result;
    }

    function getById($con)
    {
        $result = $con->prepare("SELECT * FROM clientes where dniCliente = :dni");
        $result->bindValue(':dni', $this->dni);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    function insert($con)
    {
        $result = $con->prepare("INSERT INTO clientes values ('$this->dni', '$this->nombre', '$this->direccion', '$this->email', '$this->pass', '$this->isAdmin')");
        $result->execute();
        return $result;
    }
}

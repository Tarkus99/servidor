<?php

class Base
{
    private $link;
    private $hasTransaction = false;
    function __construct()
    {
        try {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            );
            $this->link = new PDO('mysql:host=localhost;dbname=virtualmarket', 'root', '', $opciones);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function __get($var)
    {
        if (property_exists(__CLASS__, $var))
            return $this->$var;
        return NULL;
    }
    function beginTransaction(): bool
    {
        if ($this->hasTransaction) {
            return false;
        } else {
            $this->hasTransaction = true;
            return $this->link->beginTransaction();
        }
    }

    function rollback()
    {
        $this->hasTransaction = false;
        return $this->link->rollBack();
    }

    function commit()
    {
        $this->hasTransaction = false;
        return $this->link->commit();
    }
}

class Pedido
{
    private $idPedido;
    private $fecha;
    private $dniCliente;
    function __construct($id, $fecha, $idCliente)
    {
        $this->idPedido = $id;
        $this->fecha = $fecha;
        $this->dniCliente = $idCliente;
    }

    function existe($con)
    {
        $result = $con->link->prepare('SELECT * FROM pedidos WHERE idPedido = ?');
        $result->bindParam(1, $this->idPedido);
        $result->execute();
        return $result->fetch(PDO::FETCH_BOTH);
    }

    function insertar($con)
    {
        $result = $con->link->prepare("INSERT into pedidos values (?, ?, ' ', NULL, NULL, NULL,?)");
        $result->bindParam(1, $this->idPedido);
        $result->bindParam(2, $this->fecha);
        $result->bindParam(3, $this->dniCliente);
        $a = $result->execute();
        return $a;
    }
}
class Linea
{
    private $idPedido;
    private $idProducto;
    private $cantidad;
    private $linea;
    function __construct($idPedido, $idProducto, $cantidad)
    {
        $this->idPedido = $idPedido;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
    }
    function getCount($con)
    {
        $result = $con->link->prepare('SELECT count(*) from lineaspedidos where idPedido = ?');
        $result->bindParam(1, $this->idPedido);
        $result->execute();
        return $result->fetch(PDO::FETCH_NUM)[0];
    }
    function insertar($con)
    {
        $this->linea = $this->getCount($con) + 1;
        $result = $con->link->prepare('INSERT into lineaspedidos (idPedido, nlinea, idProducto, cantidad) values (?,?,?,?)');
        $result->bindParam(1, $this->idPedido);
        $result->bindParam(2, $this->linea);
        $result->bindParam(3, $this->idProducto);
        $result->bindParam(4, $this->cantidad);
        $a = $result->execute();
        return $a;
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

    public function __construct($dni, $nombre = null, $direccion = null, $email = null, $pass = null, $isAdmin = null)
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
    function deleteById($con)
    {
        try {
            $result = $con->prepare("DELETE FROM clientes where dniCliente = :dni");
            $result->bindValue(':dni', $this->dni);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $mensaje = $e->getMessage();
            include("echos.php");
        }
    }

    function modificar($con, $nombre, $direccion, $email, $pass, $isAdmin)
    {

        $result = $con->prepare("UPDATE clientes set nombre = ?, direccion = ?, email = ?, pwd = ?, administrador = ? where dniCliente = ?");
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $direccion);
        $result->bindParam(3, $email);
        $result->bindParam(4, $pass);
        $result->bindParam(5, $isAdmin);
        $result->bindParam(6, $this->dni);

        $result->execute();
        return $result;
    }

    function insert($con)
    {
        $result = $con->prepare("INSERT INTO clientes values ('$this->dni', '$this->nombre', '$this->direccion', '$this->email', '$this->pass', '$this->isAdmin')");
        $result->execute();
        return $result;
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

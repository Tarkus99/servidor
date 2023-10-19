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
        $a = $result->fetch(PDO::FETCH_BOTH);
        return $a;
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

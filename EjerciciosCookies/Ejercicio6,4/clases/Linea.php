<?php
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


    static function getAll($con)
    {
        $result = $con->query('SELECT * FROM lineaspedidos');
        return $result;
    }

    function guardar()
    {
        $_SESSION['linea_idPedido'] = $this->idPedido;
        $_SESSION['linea_idProducto'] = $this->idProducto;
        $_SESSION['linea_cantidad'] = $this->cantidad;
    }

    static function insertarTodas($con)
    {
        $result = $con->prepare('INSERT INTO lineaspedidos values(?,?,?,?)');
        foreach ($_SESSION['array_linea'] as $linea) {
            $result->bindParam(1, $_SESSION['idPedido']);
            $result->bindParam(2, $linea['idProducto']);
            $result->bindParam(3, $linea['cantidad']);
            $result->bindParam(4, ($linea['numLinea']));
            $result->execute();
            return $result;
        }
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

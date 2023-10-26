<?php
class Producto
{
    private $id;

    function __construct($id)
    {
        $this->idProducto = $id;
    }
    static function getAll($con)
    {
        $result = $con->prepare('SELECT * FROM productos');
        $result->execute();
        return $result->fetchAll(PDO::FETCH_BOTH);
    }
    function getById($con)
    {
        $result = $con->prepare('SELECT * FROM productos where idProducto = :id');
        $result->bindParam(':id', $this->idProducto);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}

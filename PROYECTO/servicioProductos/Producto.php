<?php
class Producto
{
    private $idProducto;

    function __construct($idProducto)
    {
        $this->idProducto = $idProducto;
    }
    static function getAll($con)
    {
        $result = $con->prepare('SELECT * FROM productos');
        $result->execute();
        return $result;
    }

    function getById($con)
    {
        $result = $con->prepare('SELECT * FROM productos where idProducto = :id');
        $result->bindParam(':id', $this->idProducto);
        $result->execute();
        return $result;
    }
}

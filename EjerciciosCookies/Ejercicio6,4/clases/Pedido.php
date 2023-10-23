<?php
class Pedido
{
    private $id;
    private $fecha;
    private $dirEntrega;
    private $nTarjeta;
    private $fechaCaducidad;
    private $matriculaRepartidor;
    private $dniCliente;

    function __construct($id, $fecha, $dniCliente, $dirEntrega = ' ', $nTarjeta = null, $fechaCaducidad = null, $matriculaRepartidor = null)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->dirEntrega = $dirEntrega;
        $this->nTarjeta = $nTarjeta;
        $this->fechaCaducidad = $fechaCaducidad;
        $this->matriculaRepartidor = $matriculaRepartidor;
        $this->dniCliente = $dniCliente;
    }

    function __get($name)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        }
        return null;
    }

    function existe($con)
    {
        $result = $con->prepare('SELECT * FROM pedidos WHERE idPedido = ?');
        $result->bindParam(1, $this->id);
        $result->execute();
        return $result->fetch(PDO::FETCH_BOTH);
    }

    function insertar($con)
    {
        $result = $con->link->prepare("INSERT INTO pedidos values(?,?,?,?,?,?,?)");
        $result->bindParam(1, $this->id);
        $result->bindParam(2, $this->fecha);
        $result->bindParam(3, $this->dirEntrega);
        $result->bindParam(4, $this->nTarjeta);
        $result->bindParam(5, $this->fechaCaducidad);
        $result->bindParam(6, $this->matriculaRepartidor);
        $result->bindParam(7, $this->dniCliente);
        $result->execute();
        return $result->rowCount();
    }

    public static function getAll($con)
    {
        $result = $con->query('SELECT p.idPedido, p.fecha, pr.nombre, pr.precio, l.cantidad, (pr.precio*l.cantidad)
                                FROM pedidos p LEFT JOIN lineaspedidos l INNER JOIN productos pr 
                                ON l.idProducto = pr.idProducto AND p.idPedido = l.idPedido 
                                ORDER BY p.idPedido');
        return $result;
    }
}

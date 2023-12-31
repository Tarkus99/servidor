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

    function __construct($id, $fecha, $dniCliente, $dirEntrega = '', $nTarjeta = null, $fechaCaducidad = null, $matriculaRepartidor = null)
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

    function guardar()
    {
        $_SESSION['idPedido'] = $this->id;
        $_SESSION['fecha'] = $this->fecha;
        $_SESSION['cliente'] = $this->dniCliente;
    }

    function insertar($con)
    {
        $result = $con->prepare("INSERT INTO pedidos (idPedido, fecha, dniCliente, dirEntrega) values(?,?,?,?)");
        $result->bindParam(1, $this->id);
        $result->bindParam(2, $this->fecha);
        $result->bindParam(3, $this->dniCliente);
        $result->bindParam(4, $this->dirEntrega);

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

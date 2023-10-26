<?php class Cliente
{
    public $nombre;
    public $email;
    public $dni;
    private $pass;
    private $direccion;

    public function __construct($dni, $pass = null, $nombre = null, $direccion = null, $email = null)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->pass = $pass;
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
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function getById($con)
    {
        $result = $con->prepare("SELECT * FROM clientes where dniCliente = :dni");
        $result->bindParam(':dni', $this->dni);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    function validar($con)
    {
        $result = $this->getById($con);
        if ($result && $result['pwd'] == $this->pass) {
            return $result;
        }
        return false;
    }

    function insert($con)
    {
        $result = $con->prepare("INSERT INTO clientes values ('$this->dni', '$this->nombre', '$this->direccion', '$this->email', '$this->pass')");
        $result->execute();
        return $result;
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

    function modificar($con, $nombre, $direccion, $email, $pass)
    {

        $result = $con->prepare("UPDATE clientes set nombre = ?, direccion = ?, email = ?, pwd = ? where dniCliente = ?");
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $direccion);
        $result->bindParam(3, $email);
        $result->bindParam(4, $pass);;
        $result->bindParam(6, $this->dni);

        $result->execute();
        return $result;
    }
}

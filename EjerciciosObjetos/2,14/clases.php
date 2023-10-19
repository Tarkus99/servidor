<?php

class Imagen
{
    private $tmp_name;
    private $name;
    private $type;

    public function __construct($tmp, $name, $type)
    {
        $this->tmp_name = $tmp;
        $this->name = $name;
        $this->type = $type;
    }

    public function __get($var)
    {
        if (property_exists(__CLASS__, $var)) {
            return $this->$var;
        }
        return NULL;
    }

    public function __set($name, $value)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name = $value;
        }
    }

    public function esta_cargado(): bool
    {
        return is_uploaded_file($this->tmp_name);
    }

    public function cambiar_nombre($directorio)
    {
        if(!$nom=estado_archivo($this->name, $directorio)){
            return false;
        }else{
            $this->name = $nom;
            return true;
        }
    }

    public function mover($fullName): void
    {
        move_uploaded_file($this->tmp_name, $fullName);
    }
}
?>
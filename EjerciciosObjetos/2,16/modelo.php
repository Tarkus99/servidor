<?php
interface ISelectorIndividual
{
    public function __construct($titulo, $nombre, $valores, $entero = 0);
    public function generaSelector();
}

abstract class SelectorIndividual implements ISelectorIndividual
{
    protected $titulo;
    protected $nombre;
    protected $valores;
    protected $entero;

    public function __construct($titulo, $nombre, $valores, $entero = 0)
    {
        $this->titulo = $titulo;
        $this->nombre = $nombre;
        $this->valores = $valores;
        $this->entero = $entero;
    }

    public abstract function generaSelector();
}

class SIRadio extends SelectorIndividual
{
    public function generaSelector()
    {
        $output = "<label>$this->titulo</label><br>";
        $i = 0;
        foreach ($this->valores as $key => $value) {
            if ($i == $this->entero) {
                $output .= "<input type='radio' name='$this->nombre' value='$key' checked>$value<br>";
            } else {
                $output .= "<input type='radio' name='$this->nombre' value='$key'>$value<br>";
            }
            $i++;
        }
        return $output . '<br><br>';
    }
}

class SISelect extends SelectorIndividual
{
    public function generaSelector()
    {
        $output = "<label>$this->titulo</label><br><select name='$this->nombre'>";
        $i = 0;
        foreach ($this->valores as $key => $value) {
            if ($i == $this->entero) {
                $output .= "<option value='$key' selected>$value</option>";
            } else {
                $output .= "<option value='$key'>$value</option>";
            }
            $i++;
        }
        $output .= "</select><br><br>";
        return $output;
    }
}

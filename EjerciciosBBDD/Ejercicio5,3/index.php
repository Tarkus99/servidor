<?php
require "modelo.php";
$bd = new Base();
$result = Cliente::getAll($bd->link);
include("VISTAS/verTabla.php");

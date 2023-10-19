<?php
require "modelo.php";
$bd= new Base();
$datos=Cliente::getAll($bd->link);
require "vista.php";
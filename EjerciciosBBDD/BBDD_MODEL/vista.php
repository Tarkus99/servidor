<?php
while($fila=$datos->fetch(PDO::FETCH_ASSOC)){
    echo $fila['nombre']."<br>";
}
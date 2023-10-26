<?php
setcookie('nombre', '', time() - 1, '/');
header("Location: index.php");

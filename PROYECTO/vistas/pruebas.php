<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php if(isset($_SESSION['nombre'])) echo $_SESSION['nombre']; else echo "Login";?></h1>
    <form action="">
        dni
        <input type="text" name="dni" id="user"><br>
        pass
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" value="login" id="login">
    </form>

    <script src="../vistas/pruebas.js">

    </script>
</body>

</html>
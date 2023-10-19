<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px;
        }

        table {
            border: 1px solid black;
            text-align: center;
            width: 40%;
            border-collapse: collapse;
            font-family: 'Roboto', sans-serif;
        }

        td {
            border: 1px solid black;
            width: 20%;
            padding: 10px;
        }

        .fila {
            background-color: lightgreen;
        }
    </style>
</head>

<body>
    <table>
        <?php
        $lastId = 0;
        $current;
        $str = "";
        while ($fila = $pedidos->fetch(PDO::FETCH_NUM)) {
            $current = $fila[0];
            $str .= '<br>';
            if ($current != $lastId) {
                $lastId = $current;
                $str .= "<tr class='fila'>
                            <td>$fila[0]</td>
                            <td>$fila[1]</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href='nuevaLinea.php?id=$current'>Añadir línea</a>
                            </td>
                        </tr>";
            }
            $str .= "<tr>
                        <td></td>
                        <td>$fila[2]</td>
                        <td>$fila[3]</td>
                        <td>$fila[4]€</td>
                        <td>$fila[5]€</td>
                    </tr>";
        }
        $str .= "<tr>
                    <td>
                        <a href='nuevoPedido.php'>Añadir pedido</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>";
        echo $str;
        ?>
    </table>
</body>

</html>
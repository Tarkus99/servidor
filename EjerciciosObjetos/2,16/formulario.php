<form method='post' action=''>

    <?php
    echo $ciudad->generaSelector();
    echo $idioma->generaSelector();
    echo $sexo->generaSelector();
    echo $estado->generaSelector();
    ?>

    <input type="submit" name="enviado" value="ENVIAR">

</form>
<!-- Actividad 2.9. Subir archivos al servidor
Vamos a realizar una aplicación en php para subir un archivo al servidor a una carpeta llamada
“img”. En este caso vamos a separa el archivo formulario.html del subir.php.
Antes de subirlo definitivamente se realizan las siguientes comprobaciones:
• Si ha llegado el archivo temporal a la carpeta temporal. Si no es así da error y termina.
• Utilizando la función explode(), comprobamos si tiene extensión y si no la tiene da error y
no continua
• Comprobamos si el directorio “img” existe y si no es así se crea.
• Comprobamos si el nombre del fichero existe en esa carpeta y si es así se le añade un id
único (con la función uniqid) entre el nombre y la extensión -->

<?php
if (!empty($_FILES)) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $name = $_FILES['file']['name'];
        if (!is_dir('img'))
            mkdir('img');
        if (is_file('img/'.$name)) {
            echo 'caca';
            $partes = explode('.', $name);
            $name = "";
            $npartes = count($partes);
            if ($npartes > 1) {
                $name = $partes[0];
                for ($i = 1; $i < $npartes - 1; $i++) {
                    $name .= "." . $partes[$i];
                }
                $name .= uniqid() . '.' . $partes[$npartes - 1];
            }
        }
        move_uploaded_file($_FILES['file']['tmp_name'], 'img/' . $name);
        echo "Archivo subido correctamente con nombre: " . $name;

    } else
        echo 'Ha habido un error.';
} else
    echo "No has subido ningún archivo.";
?>
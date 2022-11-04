<?php
    function sanear($dato){
        return htmlspecialchars(trim(strip_tags($dato)),ENT_QUOTES,'UTF-8');
    }

    $directorio = "/img";
    $tamanoMaximo= "102400";

    $error = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_REQUEST["enviar"]) && $error = 0){
        
            $nombre = $_REQUEST["nombre"];
            echo("<p>Nombre: $nombre</p>");

            $apellidos = $_REQUEST["apellidos"];
            echo("<p>Apellidos: $apellidos</p>");

            $direccion = $_REQUEST["direccion"];
            echo("<p>Dirección: $direccion </p>");

            $foto = $_FILES["foto"]["name"];
        }else{
    ?>

    <form action="ejercicio1.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <?php
            if(isset($_REQUEST["enviar"])&& !preg_match("/^[A-Z]{1}[[:alpha:]]{3,12}$/",sanear($_REQUEST["nombre"]))){
                echo("<p style = 'color: red; display:inline-block;'>Nombre incorrecto</p>");
                $error = 1;
            }
        ?>
        <br><br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">
        <?php
            if(isset($_REQUEST["enviar"])&& !preg_match("/^[A-Z]{1}[[:alpha:]]+\s[A-Z][[:alpha:]]+$/",sanear($_REQUEST["apellidos"]))){
                echo("<p style = 'color: red; display:inline-block;'>Apellidos incorrectos</p>");
                $error = 1;
            }
        ?>
        <br><br>
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion">
        <?php
            if(isset($_REQUEST["enviar"]) && !preg_match("/^(^calle|^avenida|^plaza)(\s|[a-zA-ZÀ-ÿ1-9])+$/i",sanear($_REQUEST["direccion"]))){
                echo("<p style = 'color: red; display:inline-block;'>Dirección incorrecta</p>");
                $error = 1;
            }
        ?>
        <br><br>
        <label for="foto">Foto</label>
        <input type="file" name="fotos[]" id="foto" multiple="multiple">
        <?php
            if(isset($_REQUEST["enviar"]) && isset($_FILES["fotos"])){
                $nombres = $_FILES["fotos"]["name"];
                $temporales = $_FILES["fotos"]["tmp_name"];

                for ($i=0; $i < count($temporales) ; $i++) { 
                    if(!move_uploaded_file($temporales[$i], $directorio.$nombres[$i])){
                        echo("<p style = 'color: red; display:inline-block;'>No se han subido los archivos</p>");
                        $error = 1;
                    }
                }
            }
        ?>
        <br><br>
        <input type="submit" name="enviar">
        <input type="reset">
    </form>
    <?php
        ;}
    ?>
</body>
</html>

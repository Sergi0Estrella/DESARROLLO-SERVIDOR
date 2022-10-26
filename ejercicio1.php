<?php
    function sanear($dato){
        return htmlspecialchars(trim(strip_tags($dato)),ENT_QUOTES,'UTF-8');
    }
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

            echo("<p>Foto de la noticia:<img src='$foto'></p>");
        }else{
    ?>

    <form action="ejercicio1.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <?php
            if(isset($_REQUEST["enviar"])&& !preg_match("/^$/",sanear($_REQUEST["nombre"]))){
                //aqui me he quedado
            }
        ?>
    </form>
    <?php
        ;}
    ?>
</body>
</html>
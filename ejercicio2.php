<?php
    function sanear($dato){
        return htmlspecialchars(trim(strip_tags($dato)),ENT_QUOTES,'UTF-8');
    }

    if(isset($_REQUEST["enviar"])){
        echo("<p>La noticia se ha subido correctamente</p>");

        $titulo = sanear($_REQUEST["titulo"]);
        echo("<p>Título: $titulo</p>");

        $texto = sanear($_REQUEST["texto"]);
        echo("<p>Texto de la noticia: $texto</p>");

        $categoria = $_REQUEST["categoria"];
        echo("<p>Categoría: $categoria</p>");

        if(is_uploaded_file($_FILES["foto"]["tmp_name"])){
            $nombreDirectorio = "img/";
            $foto = $_FILES["foto"]["name"];

            $nombreCompleto = $nombreDirectorio.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"],$nombreCompleto);
            echo("<p>Foto de la noticia:<a href='$nombreCompleto'>$foto</a></p>");
        }else{
            echo("<p>No has subido ninguna foto</p>");
        }
    }else{
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
    <h1>Insertar una nueva noticia</h1>
    <form action="ejercicio2.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Titulo*:</label>
        <input type="text" name="titulo" id="titulo" required>
        <br>
        <label for="texto">Texto*:</label>
        <textarea name="texto" id="texto" cols="30" rows="10" required></textarea>
        <br><br>
        <label for="categoria">Categoría</label>
        <select name="categoria" id="categoria">
            <option value="Costas">Costas</option>
            <option value="Montañas">Montañas</option>
            <option value="Ciudad">Ciudad</option>
        </select>
        <br><br>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto">
        <br><br>
        <input type="submit" name="enviar">
        <input type="reset">
    </form>
</body>
</html>

<?php
    ;}
?>
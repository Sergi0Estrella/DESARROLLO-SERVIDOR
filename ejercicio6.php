<?php
    if(isset($_REQUEST["enviar"])){

        $tamano = $_FILES["foto"]["size"];
        $nombre = $_FILES["foto"]["name"];

        $directorio = "fotos/";

        if(!is_dir($directorio)){
            mkdir($directorio);
        }

        $directorio = "fotos/fotos.txt";

        $puntero = fopen($directorio,'a+');

        fwrite($puntero,"Imagen: $nombre");
        fputs($puntero,"\r\n");

        fwrite($puntero,"Tamaño: $tamano bytes");
        fputs($puntero,"\r\n");


        fputs($puntero,"------------");
        fputs($puntero,"\r\n");

        fclose($puntero);

        echo "<p>Foto subida con el nombre $nombre y con $tamano bytes de peso</p>";

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
    <form action="ejercicio6.php" method="post" enctype="multipart/form-data">
        <label for="foto">Foto:</label>
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




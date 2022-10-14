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
    if(isset($_GET["nombre"])&&isset($_GET["apellidos"])){  
        $nombre = $_GET["nombre"];
        $apellidos = //aqui me he quedado
    }else{
    ?>

    <form action="ejercicio1.php" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre">
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos">
        <br><br>
        <input type="submit">
        <input type="reset">
    </form>

    <?php
    ;}
    ?>
    
</body>
</html>
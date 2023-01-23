<?php
    session_start();

    if(!isset($_SESSION["autorizado"])){
        header("Location:login.php?error=error");
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
    <ul>
        <li><a href="listado.php">Ver todos los usuarios</a></li>
        <li><a href="anadirUsuario.php">Añadir un nuevo usuario</a></li>
        <li><a href="anadirCampo.php">Añadir un nuevo campo</a></li>
    </ul>
</body>
</html>
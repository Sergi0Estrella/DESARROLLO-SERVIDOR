<?php
    session_start();

    if(!isset($_SESSION["autorizado"])){
        header("Location:login.php?error=error");
    }

    if(isset($_REQUEST["enviar"])){
        if(!empty($_REQUEST["nombre"]) && !empty($_REQUEST["tipo"])){
            $nombre = $_REQUEST["nombre"];
            $tipo = $_REQUEST["tipo"];
            try{
                $con = new PDO("mysql:host=localhost;dbname=agenda","root","");
                $alter = $con -> prepare("alter table usuarios add $nombre $tipo");
                $alter -> execute([$_REQUEST["nombre"], $_REQUEST["tipo"]]);
                
                echo "<p style='color:green'>Campo añadido correctamente</p>";
                echo "<a href='principal.php'>Volver al inicio</a>";
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }else{
            echo "<p style='color:red'>No puedes añadir campos vacíos y/o que no existan</p>";
            echo "<a href='principal.php'>Volver al inicio</a>";
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
    <form action="anadirCampo.php" method="post">
        <label for="nombre">Nombre de la columna</label>
        <input type="text" name="nombre" id="nombre">
        <br><br>
        <label for="tipo">Tipo de datos y tamaño</label>
        <input type="text" name="tipo" id="tipo">
        <br><br>
        <input type="submit" name="enviar">
    </form>
</body>
</html>

<?php
    ;}
?>
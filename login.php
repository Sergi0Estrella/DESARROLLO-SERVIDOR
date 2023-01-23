<?php
    session_start();

    if(isset($_SESSION["autorizado"])){
        if($_SESSION["autorizado"] == true){
            header("Location:principal.php");
        }
    }

    function sanear($dato){
        if(isset($dato)){
            $variable = htmlspecialchars(trim(strip_tags($dato)));
        }else{
            $variable = "";
        }
        return $variable;
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
    <h1>Bienvenido, por favor identifíquese</h1>
    <?php
        if(isset($_SESSION["autorizado"])){
            if($_SESSION["autorizado"] == false){
                echo "<p style='color:red'>Usuario o contraseña incorrecto/s</p>";
            }
        }
        
        if(isset($_GET["error"])){
            echo "<p style='color:red'>No puede acceder hasta que se identifique</p>";
        }
    ?>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <br><br>
        <label for="contrasena">Contraseña</label>
        <input type="text" name="contrasena" id="contrasena">
        <br><br>
        <input type="submit" name="enviar">
        <input type="reset">
    </form>
</body>
</html>

<?php
    if(isset($_REQUEST["enviar"]) && !empty($_REQUEST["usuario"]) && !empty($_REQUEST["contrasena"])){
        
        $usuario = sanear($_REQUEST["usuario"]);
        $contrasena = sanear($_REQUEST["contrasena"]);

        try{
            $dsn = new PDO("mysql:host=localhost","root","");
            $dsn -> query("create database if not exists agenda");
            $dsn = new PDO("mysql:host=localhost;dbname=agenda;","root","");

            $dsn -> query("create table if not exists usuarios(
                ID int auto_increment primary key,
                Nombre varchar (30) not null,
                Usuario varchar (30) not null,
                Contrasena varchar (30) not null,
                Correo varchar (30) not null
            );");

            $selectID = $dsn -> query("select * from usuarios");

            if($selectID -> rowCount() == 0){
                $dsn -> query("insert into usuarios values('0','Antonio Martin','user1','adm1','anto1@gmail.com')");
                $dsn -> query("insert into usuarios values('0','Juan Gómez','user2','adm2','juang@gmail.com')");
                $dsn -> query("insert into usuarios values('0','Alicia Navarro','user3','adm3','alician@gmail.com')");
                $dsn -> query("insert into usuarios values('0','Nuria Matrínez','user4','adm4','nuriam@gmail.com')");
            }

            $selectID = $dsn -> prepare("select ID from usuarios where Usuario = ? and Contrasena = ?");
            $selectID -> execute([$usuario, $contrasena]);

            if($selectID -> rowCount() != 0){
                $_SESSION["autorizado"] = true;
            }else{
                $_SESSION["autorizado"] = false;
            }
        }catch(PDOException $e){
            echo $e -> getMessage();
        }
    }
?>
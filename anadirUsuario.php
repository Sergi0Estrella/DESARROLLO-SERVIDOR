<?php
    session_start();

    function sanear($dato){
        if(isset($dato)){
            $variable = htmlspecialchars(trim(strip_tags($dato)));
        }else{
            $variable = "";
        }
        return $variable;
    }

    if(!isset($_SESSION["autorizado"])){
        header("Location:login.php?error=error");
    }

    $error = false;

    if(isset($_REQUEST["enviar"])){
        try{
            $con = new PDO("mysql:host=localhost;dbname=agenda","root","");
            $campos = $con -> query("desc usuarios");
            $campos -> execute();
            
            $contador=0;

            foreach ($campos as $key => $registro) {
                $contador++;
            }

            echo $contador;

        }catch(PDOException $e){
            echo $e->getMessage();
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
    <h1>Nuevo Usuario</h1>
    <form action="anadirUsuario.php" method="post">
<?php
    try{
        $con = new PDO("mysql:host=localhost;dbname=agenda","root","");
        $campos = $con -> query("desc usuarios");
        $campos -> execute();

        foreach ($campos as $key => $value) {
            echo "<label for='".$value[0]."'>".$value[0].":</label>";
            $a = explode("(",$value[1]);
            echo "<input type='text' name='".$a[0]."' placeholder='".$a[0]."'>";
            echo "<br>";
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>
        <br><br>
        <input type="submit" name="enviar">
    </form>
</body>
</html>

<?php
    ;}
?>
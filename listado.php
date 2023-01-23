<?php
    session_start();

    if(!isset($_SESSION["autorizado"])){
        header("Location:login.php?error=error");
    }

    try{
        $dsn = new PDO("mysql:host=localhost;dbname=agenda","root","");
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
    <h1>Lista de usuarios</h1>
    <form action="listado.php" method="get">
        <table>
<?php
            $usuarios = $dsn -> prepare("desc usuarios");
            $usuarios -> execute();
            $lista = $usuarios -> fetchAll(PDO::FETCH_ASSOC);

            echo "<tr style='border:1px solid black'>";
            foreach ($lista as $key => $usuario) {
                foreach ($usuario as $key2 => $valor) {
                    if($key2 == "Field"){
                        if($valor == "Nombre"){
                            echo "<td style='border:1px solid black'><input type='submit' name='ascendente' value='asc'>".$valor."<input type='submit' name='descendente' value='desc'></td>";
                        }else{
                            echo "<td style='border:1px solid black'>".$valor."</td>";
                        }
                    }
                }
            }
            echo "</tr>";  
            
            if(isset($_REQUEST["ascendente"])){
                $usuarios = $dsn -> prepare("select * from usuarios order by Nombre");
                $usuarios -> execute();
                $lista = $usuarios -> fetchAll(PDO::FETCH_ASSOC);
            }else if(isset($_REQUEST["descendente"])){
                $usuarios = $dsn -> prepare("select * from usuarios order by Nombre desc");
                $usuarios -> execute();
                $lista = $usuarios -> fetchAll(PDO::FETCH_ASSOC);
            }else{
                $usuarios = $dsn -> prepare("select * from usuarios");
                $usuarios -> execute();
                $lista = $usuarios -> fetchAll(PDO::FETCH_ASSOC);
            }

            
            foreach ($lista as $key => $usuario) {
                echo "<tr style='border:1px solid black'>";
                foreach ($usuario as $key2 => $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>"; 
            }
            
?>
        </table>
    </form>
    <br><br>
    <a href="principal.php">Volver a la aplicación</a>
</body>
</html>
<?php
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
?>


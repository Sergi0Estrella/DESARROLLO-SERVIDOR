<?php

function sanear ($dato){
    if(isset($dato)){
        $dato = htmlspecialchars(trim(strip_tags($dato,"UTF-8")));
    }else{
        $dato = "";
    }

    return $dato;
}

    if(isset($_REQUEST["enviar"])){
        $nombre = sanear($_REQUEST["nombre"]);
        echo("Tu nombre es $nombre");
        $contrasena = sanear($_REQUEST["contrasena"]);
        
        echo("Tu contraseña es $contrasena");
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
    <p>Introduce los siguientes datos:</p>
    <form action="ejercicio2.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="contrasena">Contraseña:</label>
        <input type="text" name="contrasena" id="contrasena">
        <br><br>
        <p>Nivel de estudios:</p>
        <label for="Sin estudios">Sin estudios:</label>
        <input type="checkbox" name="Sin estudios" id="Sin estudios" value="Sin estudios">
        <label for="E.S.O">E.S.O</label>
        <input type="checkbox" name="E.S.O" id="E.S.O" value="E.S.O">
        <label for="Bachillerato">Bachillerato:</label>
        <input type="checkbox" name="Bachillerato" id="Bachillerato" value="Bachillerato">
        <label for="F.P">F.P:</label>
        <input type="checkbox" name="F.P" id="F.P" value="F.P">
        <label for="Grado universitario">Grado universitario:</label>
        <input type="checkbox" name="Grado universitario" id="Grado universitario" value="Grado universitario">
        <label for="Otros">Otros:</label>
        <input type="checkbox" name="Otros" id="Otros" value="Otros">
        <br><br>
        <p>Nacionalidad</p>
        <label for="Hispana">Hispana:</label>
        <input type="radio" name="nacionalidad" id="Hispana" value="Hispana">
        <label for="Sajona">Sajona:</label>
        <input type="radio" name="nacionalidad" id="Sajona" value="Sajona">
        <label for="Otra">Otra:</label>
        <input type="radio" name="nacionalidad" id="Otra" value="Otra">
        <br><br>
        <p>Idiomas</p>
        <label for="Ingles">Ingles:</label>
        <input type="checkbox" name="idiomas" id="idiomas" value="Ingles">
        <label for="Castellano">Castellano:</label>
        <input type="checkbox" name="idiomas" id="idiomas" value="Castellano">
        <label for="Francés">Francés</label>
        <input type="checkbox" name="idiomas" id="idiomas" value="Francés">
        <label for="Alemán">Alemán</label>
        <input type="checkbox" name="idiomas" id="idiomas" value="Alemán">
        <br><br>
        <label for="email">Correo Electrónico:</label>
        <input type="text" name="email" id="email">
        <label for="web">Sitio web:</label>
        <input type="text" name="web" id="web">
        <br><br>
        <input type="submit" name="enviar">
        <input type="reset">
    </form>
</body>
</html>
<?php
    ;}
?>
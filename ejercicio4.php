<?php
    function sanear($dato){
        return htmlspecialchars(trim(strip_tags($dato)),ENT_QUOTES,'UTF-8');
    }

    if(isset($_REQUEST["enviar"])){
        $nombre = sanear($_REQUEST["nombre"]);
        $apellidos = sanear($_REQUEST["apellidos"]);
        $direccion = sanear($_REQUEST["direccion"]);
        $idiomas = sanear($_REQUEST["idiomas"]);
        $sexo = sanear($_REQUEST["sexo"]);
        $email = sanear($_REQUEST["email"]);
        $estudios = sanear($_REQUEST["estudios"]);

        if(!preg_match("/^[A-Z]{1}[[:alpha:]]{2,11}$/",$nombre)|| !preg_match("/^[[:alpha:]]{3,12}\s[[:alpha:]]{3,12}$/",$apellidos) || !preg_match("/^[[:alpha:]]{3,12}$/",$direccion) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
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
                    <form action="ejercicio4.php" method="post">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                        <?php
                            if(!preg_match("/^[A-Z]{1}[[:alpha:]]{2,11}$/",$nombre)){
                                echo("<p style='color: red'>Campo erróneo</p>");
                            }
                        ?>
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos">
                        <?php
                            if(!preg_match("/^[[:alpha:]]{3,12}\s[[:alpha:]]{3,12}$/",$apellidos)){
                                echo("<p style='color: red'>Campo erróneo</p>");
                            }
                        ?>
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" id="direccion">
                        <?php
                            if(!preg_match("/^[[:alpha:]]{3,12}$/",$direccion)){
                                echo("<p style='color: red'>Campo erróneo</p>");
                            }
                        ?>
                        <label for="fecha_nacimiento">Fecha nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                        <label for="edad">Edad:</label>
                        <input type="number" name="edad" id="edad">
                        <br>
                        <label for="idiomas">Idiomas:</label>
                        <input type="checkbox" name="idiomas[]" id="idiomas" value="Castellano">
                        <input type="checkbox" name="idiomas[]" id="idiomas" value="Rumano">
                        <input type="checkbox" name="idiomas[]" id="idiomas" value="Inglés">
                        <input type="checkbox" name="idiomas[]" id="idiomas" value="Francés">
                        <br>
                        <label for="sexo">Sexo:</label>
                        <input type="radio" name="sexo" id="sexo" value="Masculino">
                        <input type="radio" name="sexo" id="sexo" value="Femenino">
                        <br>
                        <label for="email">Correo Electrónico:</label>
                        <input type="text" name="email" id="email">
                        <?php
                            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                                echo("<p style='color: red'>Campo erróneo</p>");
                            }
                        ?>   
                        <br>
                        <label for="estudios">Estudios:</label>
                        <select name="estudios" id="estudios">
                            <option value="E.S.O">E.S.O</option>
                            <option value="Bachillerato">Bachillerato</option>
                            <option value="Ciclo Formativo">Ciclo Formativo</option>
                            <option value="Grado UNiversitario">Grado Universitario</option>
                        </select>
                        <br><br>
                        <input type="submit" name="enviar">
                        <input type="reset">
                    </form>
                </body>
                </html>
            <?php
        }else{
        
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
    <form action="ejercicio4.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos">
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion">
        <label for="fecha_nacimiento">Fecha nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad">
        <br>
        <label for="idiomas">Idiomas:</label>
        <input type="checkbox" name="idiomas[]" id="idiomas" value="Castellano">
        <input type="checkbox" name="idiomas[]" id="idiomas" value="Rumano">
        <input type="checkbox" name="idiomas[]" id="idiomas" value="Inglés">
        <input type="checkbox" name="idiomas[]" id="idiomas" value="Francés">
        <br>
        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" id="sexo" value="Masculino">
        <input type="radio" name="sexo" id="sexo" value="Femenino">
        <br>
        <label for="email">Correo Electrónico:</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="estudios">Estudios:</label>
        <select name="estudios" id="estudios">
            <option value="E.S.O">E.S.O</option>
            <option value="Bachillerato">Bachillerato</option>
            <option value="Ciclo Formativo">Ciclo Formativo</option>
            <option value="Grado UNiversitario">Grado Universitario</option>
        </select>
        <br><br>
        <input type="submit" name="enviar">
        <input type="reset">
    </form>
</body>
</html>
<?php
    ;}
?>
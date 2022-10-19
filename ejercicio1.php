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
        function sanear ($dato){
            if(isset($dato)){
                $dato = htmlspecialchars(trim(strip_tags($dato,"UTF-8")));
            }else{
                $dato = "";
            }

            return $dato;
        }

        if(isset($_REQUEST["enviar"])){
            $nombre = $_REQUEST["nombre"];
            $telefono = $_REQUEST["telefono"];
            $correo = $_REQUEST["correo"];

           $nombre = sanear($nombre);
           $telefono = sanear($telefono);
           $correo = sanear($correo);
           
           if(preg_match("/[[:digit:]]/",$nombre)){
                ?>
                <form action="ejercicio1.php" method="post">
                    <p>Escriba los datos siguientes:</p>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
                    <p style="color: red;">Nombre incorrecto</p>
                    <br>
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="telefono">
                    <br>
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" id="correo">
                    <br><br>
                    <input type="submit" name="enviar">
                    <input type="reset">
                </form>
                <?php
           }

           //Aqui me he quedado

        }else{
    ?>

    <form action="ejercicio1.php" method="post">
        <p>Escriba los datos siguientes:</p>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" id="telefono">
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo">
        <br><br>
        <input type="submit" name="enviar">
        <input type="reset">
    </form>
    
    <?php
    ;}
    ?>
</body>
</html>
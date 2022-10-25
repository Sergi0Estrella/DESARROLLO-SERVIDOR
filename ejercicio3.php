<?php
    function sanear($dato){
        return htmlspecialchars(trim(strip_tags($dato)),ENT_QUOTES,'UTF-8');
    }

    if(isset($_REQUEST["enviar"])){     

        $direccion = $_REQUEST["direccion"];
        if($direccion== " "){
            echo("<p>Dirección: $direccion</p>");
        }else{
            echo("<p style='color: red'>Debe igresar una dirección</p>");
        }

        $precio = $_REQUEST["precio"];
        if(ctype_digit($precio)){
            echo("<p>Precio: $precio</p>");
        }else if(!isset($_REQUEST["precio"])){
            echo("<p style='color: red'>Debe ingresar un precio</p>");
        }else{
            echo("<p style='color: red'>El precio de la vivienda debe ser numérico</p>");
        }

        $zona = sanear($_REQUEST["zona"]);
        echo("<p>Zona: $zona</p>");


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
        <form action="ejercicio3.php" method="post" enctype="multipart/form-data">
            <label for="vivienda">Tipo de vivienda:</label>
            <select name="vivienda" id="vivienda">
                <option value="Piso">Piso</option>
                <option value="Chalet">Chalet</option>
                <option value="Duplex">Dúplex</option>
            </select>
            <label for="zona">Zona:</label>
            <select name="zona" id="zona">
                <option value="Centro">Centro</option>
                <option value="Norte">Norte</option>
                <option value="Sur">Sur</option>
                <option value="Este">Este</option>
                <option value="Oeste">Oeste</option>
            </select>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion">
            <br><br>
            <label for="dormitorios">Nº de dormitorios:</label>
            <input type="radio" name="1" id="1" value="1">1
            <input type="radio" name="2" id="2" value="2">2
            <input type="radio" name="3" id="3" value="3">3
            <input type="radio" name="4" id="4" value="4">4
            <input type="radio" name="5" id="5" value="5">5
            <br><br>
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio">€
            <br><br>
            <label for="tamano">Tamaño:</label>
            <input type="text" name="tamano" id="tamano">m<sup>2</sup>
            <br><br>
            <label for="extras">Extras:</label>
            <input type="checkbox" name="extras[]" id="extras" value="Piscina">Piscina
            <input type="checkbox" name="extras[]" id="extras" value="Jardín">Jardín
            <input type="checkbox" name="extras[]" id="extras" value="Garaje">Garaje
            <br><br>
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">
            <br><br>
            <label for="observaciones">Observaciones:</label>
            <textarea name="observaciones" id="observaciones" cols="30" rows="10"></textarea>
            <br><br>
            <input type="submit" name="enviar">
            <input type="reset">
        </form>
    </body>
    </html>
<?php
    ;}
?>
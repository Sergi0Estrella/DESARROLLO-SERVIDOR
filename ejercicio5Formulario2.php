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

        
        $filas = $_POST["filas"];
        $columnas = $_POST["columnas"];

        echo("<form action='ejercicio5.php' method='post'>");
        echo("<table>");

        for($i=0;$i<$filas;$i++){
            echo("<tr>");
            for($j=0;$j<$columnas;$j++){
                echo("<td><input type='number' name='matriz[$i][$j]'</td>");
            }
            echo("</tr>");
        }

        echo("</table>");
        echo("<br>");
        echo("<input type='submit'>");
        echo("<input type='reset'>");
        echo("</form>");
    ?>
</body>
</html>
<?php
    $matriz = $_POST["matriz"];
    $matriz_aux = $matriz;
    echo("<p>La matriz dada la vuelta es:</p>");

    echo("<table>");
    for($i=0;$i<count($matriz);$i++){
        echo("<tr>");
        for($j=0;$j<count($matriz);$j++){
            echo("<td>");
             
           if($i==count($matriz_aux)-1){
                $matriz[$i][$j]=$matriz_aux[0][$j];
           }else{
                $matriz[$i][$j]=$matriz_aux[$i+1][$j];
           }
            print($matriz[$i][$j]);
            echo("</td>");
        }
        echo("</tr>");
    }
    echo("</table>");

    echo("<h1>Se me da de puta madre programar</h1>");
?>
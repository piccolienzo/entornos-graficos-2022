<?php
    extract($_GET);

    include("../connection.inc");
    $query = "select * from usuarios";
    if( isset($textSearch) ) $query .= " where legajo like '%".$textSearch."%' or nombre like '%".$textSearch."%' or apellido like '%".$textSearch."%'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
    echo("<table>");

    while($row = mysqli_fetch_array($result)) {
        //TO DO: DAR EL FORMATO NECESARIO PARA LA PAGINA
        echo("<tr>".$row["nombre"]."</tr>");
    }

    echo("</table>");
?>
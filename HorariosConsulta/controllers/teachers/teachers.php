<?php
    include('../connection.inc');
    extract($_GET);

    $query = "select * from profesores inner join usuarios on profesores.idUsuario = usuarios.id";
    if(isset($textSearch)) $query .= " where nombre like '%".$textSearch."%' or apellido like '%".$textSearch."%' or legajo like '%".$textSearch."%'";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            echo($row['nombre']);
        }
    }
    else {
        echo("No se encontraron resultados");
    }
    mysqli_close($link);
?>
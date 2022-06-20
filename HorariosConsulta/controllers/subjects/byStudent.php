<?php
    include('../connection.inc');
    extract($_GET);

    $query = "
        select * from alumnos_materias
        inner join materias on materias.id = alumnos_materias.idMateria
    ";
    $query .= " where idAlumno = ".$id;

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
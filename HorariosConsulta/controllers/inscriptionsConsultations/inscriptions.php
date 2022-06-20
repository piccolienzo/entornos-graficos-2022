<?php
    include('../connection.inc');
    extract($_GET);

    $field = ($typeSearch == "consultas") ? "idConsulta" : "idAlumno";

    $query = "
        select * from inscripciones_consultas
        inner join consultas on consultas.id = inscripciones_consultas.idConsulta
        inner join profesores_materias on profesores_materias.id = consultas.idProfesorMateria
        inner join materias on materias.id = profesores_materias.idMateria
    ";
    $query .= " where ".$field." = ".$id;

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
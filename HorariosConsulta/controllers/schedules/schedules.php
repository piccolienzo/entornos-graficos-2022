<?php
    include('../connection.inc.php');
    extract($_GET);

    $query = "
        select * from profesores
        inner join profesores_materias on profesores_materias.idProfesor = profesores.idUsuario
        inner join cursos on cursos.idProfesorMateria = profesores_materias.id
        inner join horarios on horarios.idCurso = cursos.id
    ";
    $query .= " where idUsuario = ".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            echo($row['horaInicio']);
        }
    }
    else {
        echo("No se encontraron resultados");
    }
    mysqli_close($link);
?>
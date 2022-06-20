<?php
    include('../connection.inc');
    extract($_POST);

    $query = "
        select * from inscripciones_consultas
        where idAlumno = ".$idAlumno;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) > 0) {
        echo("Ya estás inscripto en esta consulta");
        $consultation = mysqli_fetch_array($result);; 
    }
    else {
        $query = "insert into inscripciones_consultas (idAlumno, idConsulta, fechaHora)";
        $query .= " values (".$idAlumno.", ".$idConsulta.", '".date("Y-m-d")."')";
    
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        echo("Creada exitosamente");
    }

    mysqli_close($link);
?>
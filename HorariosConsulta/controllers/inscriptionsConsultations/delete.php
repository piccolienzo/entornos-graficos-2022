<?php
    include('../connection.inc');
    extract($_GET);

    $query = "
        select * from consultas
        where id = ".$idConsulta;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $consultation = mysqli_fetch_array($result);

    $datetime1 = date_create($consultation["fecha"]);
    $datetime2 = date_create(date("Y-m-d h:m"));

    $interval = date_diff($datetime1, $datetime2);
    $differenceDays = $interval->format('%d');

    if($differenceDays > 1) {
        $query = "
            delete from inscripciones_consultas
            where idAlumno = ".$idAlumno." and idConsulta = ".$idConsulta;

        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        echo "Inscripción borrada exitosamente";
    }
    else {
        echo "No puede cancelar una inscripción a una consulta que se dará en menos de 24 horas";
    }
    
    mysqli_close($link);
?>
<?php
    include('../connection.inc');
    extract($_GET);

    //TO DO: Falta revisar la diferencia de 24 hs
    $query = "
        delete from inscripciones_consultas
        where idAlumno = ".$idAlumno;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    echo "Inscripción borrada exitosamente";

    mysqli_close($link);
?>
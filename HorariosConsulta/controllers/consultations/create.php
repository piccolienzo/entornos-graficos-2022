<?php
    include('../connection.inc');
    extract($_POST);

    $query = "insert into consultas (idProfesorMateria, cupo, esVirtual, horaInicio, horaFin, dia, lugar)";
    $query .= " values (".$idProfesorMateria.", ".$cupo.", ".$esVirtual.", ".$horaInicio.", ".$horaFin.", ".$dia.", ".$lugar.")";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    echo("Creado exitosamente!");
    mysqli_close($link);
?>
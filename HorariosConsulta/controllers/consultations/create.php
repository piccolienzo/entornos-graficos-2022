<?php
    include('../connection.inc.php');
    extract($_POST);

    $horaInicio = substr($hora, 0, 5);
    $horaFin = substr($hora, 6, 5);
    $query = "insert into consultas (idProfesorMateria, cupo, esVirtual, horaInicio, horaFin, dia, lugar)";
    $query .= " values (".$idProfesorMateria.", ".$cupo.", "
        .$esVirtual.", '".$horaInicio."', '".$horaFin."', '".$dia."', '".$lugar."')";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    mysqli_close($link);
    header("Location: ../../views/pages/listado-consultas-admin.php");
    exit("");
?>
<?php
    include('../connection.inc');
    extract($_POST);

    if(isset($hora)) {
        $horaInicio = substr($hora, 0, 5);
        $horaFin = substr($hora, 6, 5);
    }

    $query = "update consultas set ";
    if(isset($cupo)) $query .= "cupo = ".$cupo;
    if(isset($esVirtual)) $query .= ", esVirtual = ".$esVirtual;
    if(isset($horaInicio)) $query .= ", horaInicio = '".$horaInicio."'";
    if(isset($horaFin)) $query .= ", horaFin = '".$horaFin."'";
    if(isset($dia)) $query .= ", dia = '".$dia."'";
    if(isset($lugar)) $query .= ", lugar = '".$lugar."'";

    $query .= " where id =".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    mysqli_close($link);
    header("Location: ../../views/pages/mensaje.php");
?>
<?php
    include('../connection.inc');
    extract($_POST);

    $query = "update consultas set ";
  
    if(isset($cupo)) $query .= "cupo = ".$cupo;
    if(isset($esVirtual)) $query .= ", esVirtual = ".$esVirtual;
    if(isset($horaInicio)) $query .= ", horaInicio = ".$horaInicio;
    if(isset($horaFin)) $query .= ", horaFin = ".$horaFin;
    if(isset($dia)) $query .= ", dia = ".$dia;
    if(isset($lugar)) $query .= ", lugar = ".$lugar;

    $query .= "where id =".$id;
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    echo("Modificado exitosamente!");
    mysqli_close($link);
?>
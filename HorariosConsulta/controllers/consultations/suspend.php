<?php
    include('../connection.inc');
    extract($_POST);

    $query = "update consultas set ";
    
    $query .= "cancelado = 1";
    if(isset($motivoSuspension)) $query .= ",motivoSuspension = ".$motivoSuspension;
    if(isset($comentarioSuspension)) $query .= ", comentarioSuspension = ".$comentarioSuspension;
    if(isset($fechaEspecial)) $query .= ",fechaEspecial = ".$fechaEspecial;
    if(isset($horaInicioEspecial)) $query .= ", horaInicioEspecial = ".$horaInicioEspecial;
    if(isset($horaFinEspecial)) $query .= ", horaFinEspecial = ".$horaFinEspecial;

    $query .= "where id =".$id;
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    echo("Modificado exitosamente!");
    mysqli_close($link);
?>
<?php
    include('../connection.inc');
    extract($_POST);
    session_start();

    if(isset($hora)) {
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'profesor') {
            $horaInicioEspecial = substr($hora, 0, 5);
            $horaFinEspecial = substr($hora, 6, 5);
        }
        else {
            echo($_SESSION['role']);
            $horaInicio = substr($hora, 0, 5);
            $horaFin = substr($hora, 6, 5);
        }
    }

    $query = "update consultas set ";
    if(isset($cupo)) $query .= "cupo = ".$cupo;
    if(isset($esVirtual)) $query .= ", esVirtual = ".$esVirtual;
    if(isset($horaInicio)) $query .= ", horaInicio = '".$horaInicio."'";
    if(isset($horaFin)) $query .= ", horaFin = '".$horaFin."'";
    if(isset($horaInicioEspecial)) $query .= ", horaInicioEspecial = '".$horaInicioEspecial."'";
    if(isset($horaFinEspecial)) $query .= ", horaFinEspecial = '".$horaFinEspecial."'";
    if(isset($fechaEspecial)) $query .= ", fechaEspecial = '".$fechaEspecial."'";
    if(isset($dia)) $query .= ", dia = '".$dia."'";
    if(isset($lugar)) $query .= ", lugar = '".$lugar."'";
    
    if(isset($motivoSuspension)) $query .= "motivoSuspension = '".$motivoSuspension."'";
    if(isset($comentarioSuspension)) $query .= ", comentarioSuspension = '".$comentarioSuspension."'
        ,cancelado = 1";

    $query .= " where id =".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    mysqli_close($link);
    header("Location: ../../views/pages/mensaje.php");
?>
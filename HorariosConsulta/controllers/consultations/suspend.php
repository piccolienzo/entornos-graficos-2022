<?php
    include('../connection.inc.php');
    extract($_POST);
    extract($_GET);

    $query = "update consultas set ";
    
    $query .= "cancelado = ". ($cancelado ? '0' : '1');

    if(isset($motivoSuspension)) $query .= ",motivoSuspension = ".$motivoSuspension;
    if(isset($comentarioSuspension)) $query .= ", comentarioSuspension = ".$comentarioSuspension;
    if(isset($fechaEspecial)) $query .= ",fechaEspecial = ".$fechaEspecial;
    if(isset($horaInicioEspecial)) $query .= ", horaInicioEspecial = ".$horaInicioEspecial;
    if(isset($horaFinEspecial)) $query .= ", horaFinEspecial = ".$horaFinEspecial;

    if($cancelado) {
        $query .= ",motivoSuspension = null
            , comentarioSuspension = null";
    }

    $query .= " where id =".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    mysqli_close($link);

    header("Location: consultation.php?id=".$id."&success=true&backurl=".$backurl);
?>
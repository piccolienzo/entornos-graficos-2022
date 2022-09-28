<?php
    include('../connection.inc');
    extract($_POST);
    extract($_GET);

    $query = "update consultas set ";
    
    $query .= "cancelado = ". ($cancelado ? '0' : '1');

    if(isset($motivoSuspension)) $query .= ",motivoSuspension = ".$motivoSuspension;
    if(isset($comentarioSuspension)) $query .= ", comentarioSuspension = ".$comentarioSuspension;
    if(isset($fechaEspecial)) $query .= ",fechaEspecial = ".$fechaEspecial;
    if(isset($horaInicioEspecial)) $query .= ", horaInicioEspecial = ".$horaInicioEspecial;
    if(isset($horaFinEspecial)) $query .= ", horaFinEspecial = ".$horaFinEspecial;

    $query .= " where id =".$id;
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    mysqli_close($link);
    header("Location: ../../views/pages/listado-consultas-admin.php?success=true");
?>
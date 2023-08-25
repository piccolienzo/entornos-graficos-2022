<?php
    include('../connection.inc.php');
    extract($_POST);
    extract($_GET);

    $query = "update consultas set ";
    
    $query .= "fechaEspecial = null, horaInicioEspecial = null, horaFinEspecial = null";

    $query .= " where id =".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    mysqli_close($link);

    header("Location: consultation.php?id=".$id."&success=true&backurl=".$backurl);
    exit("");
?>
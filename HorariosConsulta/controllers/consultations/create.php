<?php
    include('../connection.inc');
    extract($_POST);
    echo($dia);
    $horaInicio = substr($hora, 0, 5);
    $horaFin = substr($hora, 6, 5);
    $query = "insert into consultas (idProfesorMateria, cupo, esVirtual, horaInicio, horaFin, dia, lugar)";
    $query .= " values (".str_replace('/','',$idProfesorMateria).", ".str_replace('/','',$cupo).", "
        .str_replace('/','',$esVirtual).", '".str_replace('/','',$horaInicio)."', '"
        .str_replace('/','',$horaFin)."', '".str_replace('/','',$dia)."', '"
        .str_replace('/','',$lugar)."')";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    mysqli_close($link);
    header("Location: ../../index.php?success=true");
?>
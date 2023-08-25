<?php
    include('../connection.inc.php');
    session_start();
    extract($_GET);

    $query = "
        select m.nombre as nombre, pm.id as id from profesores_materias pm
        inner join materias m on m.id = pm.idMateria
    ";
    $query .= " where idProfesor = ".$teacherId;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }
    $_SESSION["resultados_materias"] = $array;

    mysqli_close($link);

    $idParam = isset($id) ? "&id=".$id : "";

    header("Location: ../../views/pages/".$nextPage."?backurl=".$backurl.$idParam);
    exit("");
?>
<?php
    include('../connection.inc');
    session_start();
    extract($_GET);

    $query = "
        select * from profesores_materias
        inner join materias on materias.id = profesores_materias.idMateria
    ";
    $query .= " where idProfesor = ".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }
    $_SESSION["resultados_materias"] = $array;

    mysqli_close($link);

    header("Location: ../../views/pages/".$nextPage."?teacherId=".$id);
?>
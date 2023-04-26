<?php
    include('../../controllers/connection.inc');
    extract($_GET);

    $field = ($typeSearch == "consultas") ? "idConsulta" : "idAlumno";

    $query = "
        select nombre, apellido, email from inscripciones_consultas ic
        inner join usuarios u on u.id = ic.idAlumno
    ";
    $query .= " where ".$field." = ".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }

    mysqli_close($link);
?>
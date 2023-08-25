<?php
    include('../../controllers/connection.inc.php');
    extract($_GET);

    $field = ($typeSearch == "consultas") ? "idConsulta" : "idAlumno";

    $query = "
        select nombre, apellido, email from inscripciones_consultas ic
        inner join usuarios u on u.id = ic.idAlumno
    ";
    $query .= " where fechaHora > NOW() AND fechaHora <= DATE_ADD(NOW(), INTERVAL 7 DAY) and ".$field." = ".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }

    mysqli_close($link);
?>
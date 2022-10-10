<?php 
    session_start();
    include('../connection.inc');   

    extract($_GET);

    $query = "select m.nombre matNombre ,u.nombre profNombre, u.apellido, u.email, c.esVirtual,c.id,c.dia,c.horaInicio,c.horaFin,c.cupo,c.cancelado,c.lugar
        from materias m
        inner join profesores_materias pm on m.id = pm.idMateria
        inner join profesores p on p.idUsuario = pm.idProfesor
        inner join usuarios u on u.id = p.idUsuario
        inner join consultas c on c.idProfesorMateria = pm.id 
        where c.id = ".$id;
    echo($query);
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }
    $_SESSION["resultado_consulta"] = $array;

    mysqli_close($link);

    $success = isset($success) ? "?success=true" : "";

    header("Location: ../../views/pages/detalle-consulta.php".$success);

?>
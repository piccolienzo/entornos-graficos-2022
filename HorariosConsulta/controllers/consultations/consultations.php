<?php 
    session_start();
    include('../connection.inc');   

    extract($_GET);
    /* Parte1 */
    $isSubject = ($searchtype == 'materia') ? 1 : 0;

    $query = "select m.nombre matNombre ,u.nombre profNombre, u.apellido, u.email, c.esVirtual,c.id,c.dia,c.horaInicio,c.horaFin,c.cupo 
    from materias m
    inner join profesores_materias pm on m.id = pm.idMateria
    inner join profesores p on p.idUsuario = pm.idProfesor
    inner join usuarios u on u.id = p.idUsuario
    inner join consultas c on c.idProfesorMateria = pm.id ";

    $extraWhere = $isSubject
        ? "where m.nombre like '%".$search."%'"
        : "where u.nombre like '%".$search."%' or u.apellido like '%".$search."%'";

    $query.= $extraWhere;
    $query.=  " order by horaInicio";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }
    $_SESSION["resultados_consulta"] = $array;

    mysqli_close($link);
    header("Location: ../../views/pages/listado-consultas.php?backurl=".$backurl);

?>
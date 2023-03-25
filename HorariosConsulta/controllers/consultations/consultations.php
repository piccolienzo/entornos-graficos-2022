<?php 
    session_start();
    include('../connection.inc');   

    extract($_GET);

    $query = "select m.nombre matNombre ,u.nombre profNombre, u.apellido, u.email, u.id profId, c.esVirtual,c.id,c.dia,c.horaInicio,c.horaFin,c.cupo,c.cancelado
    from materias m
    inner join profesores_materias pm on m.id = pm.idMateria
    inner join profesores p on p.idUsuario = pm.idProfesor
    inner join usuarios u on u.id = p.idUsuario
    inner join consultas c on c.idProfesorMateria = pm.id ";

    if(isset($searchtype)) {
        $isSubject = ($searchtype == 'materia') ? 1 : 0;

        $extraWhere = $isSubject
            ? "where m.nombre like '%".$search."%'"
            : "where (u.nombre like '%".$search."%' or u.apellido like '%".$search."%')";
    
        if(isset($date) && $date != '') {
            include('../getDayLabel.inc');   
            $extraWhere .= " and c.dia = '".$dayLabel."'";
        }
        
        $query.= $extraWhere;
    }
    if(isset($_SESSION['role'])) {
        if( $_SESSION['role'] == "profesor") {
            $extraWhere = "where u.id = ".$_SESSION["usuario"]["id"];
            $query.= $extraWhere;
        }
        else if( $_SESSION['role'] == "alumno") {
            $extraWhere = "where c.cancelado = 0";
            $query.= $extraWhere;
        }
    }
    $query.=  " order by horaInicio";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }
    $_SESSION["resultados_consulta"] = $array;

    mysqli_close($link);

    if(isset($admin)) {
        header("Location: ../../views/pages/listado-consultas-admin.php");
    }
    else if(isset($teacher)) {
        header("Location: ../../views/pages/listado-consultas-profesor.php");
    }
    else {
        header("Location: ../../views/pages/listado-consultas.php?backurl=".$backurl);
    }

?>
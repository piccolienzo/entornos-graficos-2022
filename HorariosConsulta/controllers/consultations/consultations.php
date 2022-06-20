<?php 
    session_start();
    include('../connection.inc');   
    extract($_GET);

    if(isset($typeSearch)) {
        $isSubject = ($typeSearch == 'materias') ? 1 : 0;

        $field = $isSubject ? "idMateria" : "idProfesor";
        $extraWhere = $isSubject
            ? "where nombre like '%".$name."%'"
            : "where nombre like '%".$name."%' or apellido like '%".$name."%'";
        
        $query = "select * from ".$typeSearch." ".$extraWhere;

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        
        $query = "select * from profesores_materias ";
        unset($extraWhere);
        
        if(mysqli_num_rows($result) > 0) {
            require("../../core/functions.php");
            $extraWhere = getQueryArray($result, $field);
        }
        else {
            echo "No hay resultados";
        }
    }
    else {
        $query = "select * from profesores_materias";
        //La feche debe venir el formato yyyy-mm-dd
        if(isset($date))    $extraWhere = "date(".$date.") = '".date('Y-m-d')."'";
    }

    $query .= "
        inner join consultas on profesores_materias.id = consultas.idProfesorMateria
        inner join materias on profesores_materias.idMateria = materias.id
        inner join profesores on profesores_materias.idProfesor = profesores.idUsuario
        inner join usuarios on profesores.idUsuario = usuarios.id
    ";
    if(isset($extraWhere)) {
        $query .= " where ".$extraWhere;
    }
    $query .=  " order by horaInicio";
    
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) == 0) {
        echo("No se encontraron resultados");
    }
    else {
        while($fila = mysqli_fetch_array($result)){
            echo $fila["nombre"];
        }
    }
    mysqli_close($link);
?>
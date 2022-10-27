<?php
    include('../connection.inc');
    require ('../../core/mailer.php');
    extract($_POST);
    session_start();
    $query = "
        select * from inscripciones_consultas
        where idAlumno = ".$idAlumno. " and idConsulta = ".$idConsulta;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
     
    if(mysqli_num_rows($result) > 0) {
        echo("Ya estás inscripto en esta consulta");
        $consultation = mysqli_fetch_array($result);; 
        header("Location: ../../views/pages/mensaje.php?success=0"); 
    }
   else {
        try {
            $fechaHora = $fechaConsulta." ".$hora;
            $query = "insert into inscripciones_consultas (idAlumno, idConsulta, fechaHora)";
            $query .= " values (".$idAlumno.", ".$idConsulta.","."STR_TO_DATE('{$fechaHora}', '%d/%m/%Y %H:%i:%s')".");";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $query = "
            select ic.id ,ic.fechaHora, u.nombre, u.apellido, m.nombre as nombreMateria,c.esVirtual, c.horaInicio, c.horaFin,c.lugar from inscripciones_consultas ic 
            inner join consultas c on ic.idConsulta = c.id
            inner join profesores_materias pm on c.idProfesorMateria = pm.id
            inner join usuarios u on u.id = pm.idProfesor
            inner join materias m on pm.idMateria = m.id 
            where ic.idAlumno = ".$idAlumno." and ic.idConsulta = ".$idConsulta." and ic.fechaHora = "."STR_TO_DATE('{$fechaHora}', '%d/%m/%Y %H:%i:%s')" ;
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $array = array();
            while($row = mysqli_fetch_array($result)){
                array_push($array, $row);
            }
            $result  = base64_encode(json_encode($array[0]));
            $mailBody = "Inscripcion exitosa a consulta #".$array[0]["id"].". Fecha: ".$array[0]["fechaHora"].". Lugar: ".$array[0]["lugar"];      
            $mailAddress = $_SESSION["usuario"]["email"];
            $nombreApellido = $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apellido"]; 
            sendEmail($mailAddress, $nombreApellido, $mailBody,1);
            header("Location: ../../views/pages/mensaje.php?success=1&result=".$result);     
        }   
        catch(Exception $e){
            header("Location: ../../views/pages/mensaje.php?success=0"); 
        } 
    }
    mysqli_close($link);
?>
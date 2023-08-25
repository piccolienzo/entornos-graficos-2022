<?php
    include('../connection.inc.php');
    require ('../../core/mailer.php');
    extract($_POST);
    session_start();

    if(isset($hora)) {
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'profesor') {
            $horaInicioEspecial = substr($hora, 0, 5);
            $horaFinEspecial = substr($hora, 6, 5);
        }
        else {
            $horaInicio = substr($hora, 0, 5);
            $horaFin = substr($hora, 6, 5);
        }
    }

    $query = "update consultas set ";
    if(isset($cupo)) $query .= "cupo = ".$cupo;
    if(isset($esVirtual)) $query .= ", esVirtual = ".$esVirtual;
    if(isset($horaInicio)) $query .= ", horaInicio = '".$horaInicio."'";
    if(isset($horaFin)) $query .= ", horaFin = '".$horaFin."'";
    if(isset($horaInicioEspecial)) $query .= ", horaInicioEspecial = '".$horaInicioEspecial."'";
    if(isset($horaFinEspecial)) $query .= ", horaFinEspecial = '".$horaFinEspecial."'";
    if(isset($fechaEspecial)) $query .= ", fechaEspecial = '".$fechaEspecial."'";
    if(isset($dia)) $query .= ", dia = '".$dia."'";
    if(isset($lugar)) $query .= ", lugar = '".$lugar."'";
    
    if(isset($motivoSuspension)) $query .= "motivoSuspension = '".$motivoSuspension."'";
    if(isset($comentarioSuspension)) $query .= ", comentarioSuspension = '".$comentarioSuspension."'
        ,cancelado = 1";

    $query .= " where id =".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if($comentarioSuspension || $horaInicioEspecial) {
        $query = "select u.email, u.nombre, u.apellido from inscripciones_consultas ic inner join consultas c on c.id = ic.idConsulta inner join usuarios u on u.id = ic.idAlumno where c.id = ".$id;
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $mailBody = $comentarioSuspension
            ? "Se ha suspendido una consulta para la cual estabas inscripto. Ingrese al sitio web de consultas para obtener más información"
            : "Se ha modificado una consulta para la cual estabas inscripto. Ingrese al sitio web de consultas para obtener más información";
        foreach($result as $x => $user){
            $mailAddress = $user["email"];
            $nombreApellido = $user["nombre"]." ".$user["apellido"];
            sendEmail($mailAddress, $nombreApellido, $mailBody,0);
        }
    }

    mysqli_close($link);
    header("Location: ../../views/pages/listado-consultas-profesor.php?success=1");
    exit("");
?>
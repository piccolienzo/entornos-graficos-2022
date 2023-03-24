<?php
    include('../../controllers/connection.inc');


function getConsultasAlumno(){
    include('../../controllers/connection.inc');
    if(isset($_SESSION['usuario'])){

        $idUsuario = $_SESSION['usuario']["id"];
        $query = "
        select m.nombre matNombre ,u.nombre profNombre, u.apellido, u.email, u.id profId, c.esVirtual,c.id,c.dia,c.horaInicio,c.horaFin,c.cupo,c.cancelado,ic.id id, ic.fechaHora fechaHora
        from materias m
        inner join profesores_materias pm on m.id = pm.idMateria
        inner join profesores p on p.idUsuario = pm.idProfesor
        inner join usuarios u on u.id = p.idUsuario
        inner join consultas c on c.idProfesorMateria = pm.id 
        inner join inscripciones_consultas ic on ic.idConsulta = c.id where ic.idAlumno =".$idUsuario;
    
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
        $array = array();
        while($row = mysqli_fetch_array($result)){
            array_push($array, $row);
        }
        mysqli_close($link);
        return $array;
    }
}

?>
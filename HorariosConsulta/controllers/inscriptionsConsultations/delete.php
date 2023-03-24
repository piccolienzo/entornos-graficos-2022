<?php
    include('../connection.inc');
    extract($_GET);

    $query = "
        select * from inscripciones_consultas
        where id = ".$idConsulta;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $consultation = mysqli_fetch_array($result);

    $datetime1 = date_create($consultation["fechaHora"]);
    $datetime2 = date_create(date("Y-m-d h:m"));

    $interval = date_diff($datetime1, $datetime2);
    $differenceDays = $interval->format('%d');

    if($differenceDays > 1) {
        $query = "
            delete from inscripciones_consultas
            where id = ".$consultation["id"];

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);
        header("Location: ../../views/pages/mis-consultas.php?success=true"); 
    }
    else {
        mysqli_close($link);
        header("Location: ../../views/pages/mis-consultas.php?error=true");
    }
    
?>
<?php

    //TO DO: Ver como pasar rol
    $rol="alumnos";

    include('../connection.inc');
    extract($_POST);
    extract($_GET);

    $query = "select * from usuarios inner join ".$rol." on usuarios.id = ".$rol.".idUsuario"
        ." where (legajo = ".$legajo." or email like '".$email."' or usuario like '".$usuario."') and idUsuario !=". $id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) == 0) {

        $query = "update usuarios set "
            ."nombre = '".$nombre."',"
            ."apellido = '".$apellido."',"
            ."dni = '".$dni."',"
            ."email = '".$email."'"
            ."where id = '".$id
            ."'";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        header("Location: ../../views/pages/listado-usuarios.php");
    }
    else {
        echo("datos repetidos");
    }
?>

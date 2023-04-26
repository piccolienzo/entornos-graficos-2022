<?php

    include('../connection.inc');
    extract($_POST);
    extract($_GET);

    $query = "select * from usuarios"
        ." where (legajo = ".$legajo." or email like '".$email."') and id !=". $id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) == 0) {

        $query = "update usuarios set "
            ."nombre = '".$nombre."',"
            ."apellido = '".$apellido."',"
            ."dni = '".$dni."',"
            ."email = '".$email."',"
            ."legajo = '".$legajo."'"
            ." where id = '".$id
            ."'";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        header("Location: ../../views/pages/listado-usuarios.php?success=edit");
    }
    else {
        header("Location: ../../views/pages/usuario.php?edit=true&id=".$id."&error=repeatedData");
    }
?>

<?php

    $userId = $_SESSION["usuario"]["id"];

    $query = "select * from alumnos where idUsuario = ".$userId;
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) == 0) {
        $query = "select * from profesores where idUsuario = ".$userId;
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        if(mysqli_num_rows($result) == 0) {
            $query = "select * from administradores where idUsuario = ".$userId;
            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            if(mysqli_num_rows($result) == 0) {
                echo("Hubo un problema identificando el rol de este usuario");
            }
            else {
                $_SESSION["role"] = "administrador";
            }
        }
        else {
            $_SESSION["role"] = "profesor";
        }
    }
    else {
        $_SESSION["role"] = "alumno";
    }

?>
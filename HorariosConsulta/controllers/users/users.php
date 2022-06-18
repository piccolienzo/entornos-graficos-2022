<?php
    //Agreguen su archivo connection.inc con sus credenciales para entrar a MySQl
    //Les dejo uno de ejemplo
    include('./connection.inc');
    $query = "select * from usuarios where email like ".$email;
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) == 0) {
        echo("Usuario no válido");
    }
    else {
        $fila = mysqli_fetch_array($vResultado);
        if($fila["clave"] == md5($password)) {
            session_start();
            echo(fila["legajo"]);
            $_SESSION["usuario"] = $fila;
        }
        else {
            echo("Contraseña incorrecta");
        }
    }

    mysqli_close($link);
?>
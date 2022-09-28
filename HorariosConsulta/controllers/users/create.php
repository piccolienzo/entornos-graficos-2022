<?php

    session_start();
    include('../connection.inc');
    extract($_POST);

    $query = "select * from usuarios inner join ".$rol." on usuarios.id = ".$rol.".idUsuario"
        ." where legajo = '".$legajo."' or email like '".$email."' or usuario like '".$usuario."'";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) == 0) {
        $claveDefault = "1234";

        $query = "insert into usuarios (nombre, apellido, dni, usuario, email, legajo, clave) values ('"
            .$nombre."','"
            .$apellido."','"
            .$dni."','"
            .$usuario."','"
            .$email."','"
            .$legajo."','"
            .$claveDefault."'
        )";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        $query = "select * from usuarios where legajo like '".$legajo."'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $fila = mysqli_fetch_array($result);

        $query = "insert into ".$rol." (idUsuario) values (".$fila["id"].")";
        echo($query);
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        header("Location: ../../views/pages/listado-usuarios.php?success=new");
    }
    else {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=0&error=repeatedData");
    }

?>
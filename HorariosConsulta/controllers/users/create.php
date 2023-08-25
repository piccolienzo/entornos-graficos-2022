<?php

    session_start();
    include('../connection.inc.php');
    include('../contieneCaracteres.php');
    require ('../../core/mailer.php');
    extract($_POST);

    if(!contiene($nombre, $letras)) {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=0&error=invalidField&validationField=nombre&validationType=onlyLetters");
        exit("");
    }
    else if(!contiene($apellido, $letras)) {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=0&error=invalidField&validationField=apellido&validationType=onlyLetters");
        exit("");
    }
    else if(!is_numeric($dni)) {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=0&error=invalidField&validationField=dni&validationType=onlyNumbers");
        exit("");
    }
    else if(!is_numeric($legajo)) {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=0&error=invalidField&validationField=legajo&validationType=onlyNumbers");
        exit("");
    }

    else {
        $query = "select * from usuarios inner join ".$rol." on usuarios.id = ".$rol.".idUsuario"
            ." where legajo = '".$legajo."' or email like '".$email."' or usuario like '".$usuario."'";
    
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
        if(mysqli_num_rows($result) == 0) {
            $claveDefault = $legajo;
    
            $query = "insert into usuarios (nombre, apellido, dni, usuario, email, legajo, clave) values ('"
                .$nombre."','"
                .$apellido."','"
                .$dni."','"
                .$email."','"
                .$email."','"
                .$legajo."','"
                .$claveDefault."'
            )";
    
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
            $query = "select * from usuarios where legajo like '".$legajo."'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $fila = mysqli_fetch_array($result);
    
            $query = "insert into ".$rol." (idUsuario) values (".$fila["id"].")";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
            $mailAddress = $email;
            $nombreApellido = $nombre." ".$apellido; 
            $mailBody = "Ya puedes acceder al sitio web de consultas. La contraseña por defecto será su legajo.";
            sendEmail($mailAddress, $nombreApellido, $mailBody, 4);
    
            header("Location: ../../views/pages/listado-usuarios.php?success=new");
            exit("");
        }
        else {
            $_SESSION["formulario_usuario"] = $_POST;
            header("Location: ../../views/pages/usuario.php?edit=0&error=repeatedData");
            exit("");
        }
    }
?>
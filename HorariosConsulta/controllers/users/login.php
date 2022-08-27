<?php 
 
    session_start();
    
    //Agreguen su archivo connection.inc con sus credenciales para entrar a MySQl
    include('../connection.inc');
    
    extract($_POST);
    $query = "select * from usuarios where legajo like '".$legajo."'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) == 0) {
        header("Location: ../../views/pages/login.php?error=noUserFound");
    }
    else {
        $fila = mysqli_fetch_array($result);

        if(isset($password) && $fila["clave"] == ($password)) {
            $_SESSION["usuario"] = $fila;
            include('roles.php');
            header("Location: ../../index.php");
        }
        else {
            header("Location: ../../views/pages/login.php?error=wrongPassword");
        }
    }


    mysqli_close($link);
?>
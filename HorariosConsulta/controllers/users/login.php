<?php 
// const PASSWORD_DEF = 'pass';
// const LEGAJO = 'k123';

// $legajo =  htmlspecialchars($_POST['legajo']);
// $password =  htmlspecialchars($_POST['password']);

// if($legajo != LEGAJO && $password != PASSWORD_DEF){
//     echo 'err';
// }
// else{
//     echo $password;
//     echo $legajo;
//     header("Location: /horariosconsulta/views/tipo-consulta.php");
//     exit();
// }
 
    session_start();
    
    //Agreguen su archivo connection.inc con sus credenciales para entrar a MySQl
    include('../connection.inc');
    
    extract($_GET);
    $query = "select * from usuarios where email like '".$email."'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if(mysqli_num_rows($result) == 0) {
        echo("Usuario no registrado");
    }
    else {
        $fila = mysqli_fetch_array($result);

        if(isset($password) && $fila["clave"] == ($password)) {
            $_SESSION["usuario"] = $fila;
            include('roles.php');
            echo("Ingreso correcto");
        }
        else {
            echo("Contraseña incorrecta");
        }
    }

    mysqli_close($link);
?>
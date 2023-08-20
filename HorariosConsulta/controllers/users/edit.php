<?php

    include('../connection.inc');
    include('../contieneCaracteres.php');
    extract($_POST);
    extract($_GET);

    if(!contiene($nombre, $letras)) {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=true&id=".$id."&error=invalidField&validationField=nombre&validationType=onlyLetters");
    }
    else if(!contiene($apellido, $letras)) {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=true&id=".$id."&error=invalidField&validationField=apellido&validationType=onlyLetters");
    }
    else if(!is_numeric($dni)) {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=true&id=".$id."&error=invalidField&validationField=dni&validationType=onlyNumbers");
    }
    else if(!is_numeric($legajo)) {
        $_SESSION["formulario_usuario"] = $_POST;
        header("Location: ../../views/pages/usuario.php?edit=true&id=".$id."&error=invalidField&validationField=legajo&validationType=onlyNumbers");
    }

    else {
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
    }
?>
<?php
    extract($_POST);

    if(isset($correo, $asunto, $mensaje)) {
        
        if(strlen($asunto) > 0 && strlen($mensaje) > 0) {

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo "error";
            }

            $destinatario = "alejocuello.w@gmail.com"; //Acá iría el mail de la facultad que reciba las consultas
        
            mail($destinatario, $correo, $mensaje);
    
            header("Location: ../../views/pages/contacto.php");
        }
        else {
            echo 'error';
        }
    }
    else {
        echo 'error';
    }

?>
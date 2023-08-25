<?php
    extract($_POST);
    require ('../../core/mailer.php');

    if(isset($correo, $mensaje)) {
        
        if(strlen($mensaje) > 0) {

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../../views/pages/contacto.php?error=invalidEmail");
                exit("");
            }

            $destinatario = "alejocuello.w@gmail.com"; //Acá iría el mail de la facultad que reciba las consultas
        
            sendEmail($destinatario, $correo, $mensaje, 2);

            header("Location: ../../views/pages/contacto.php?success=true");
            exit("");
        }
        else {
            header("Location: ../../views/pages/contacto.php?error=emptyFields");
            exit("");
        }
    }
    else {
        header("Location: ../../views/pages/contacto.php?error=emptyFields");
        exit("");
    }

?>
<?php
    extract($_POST);
    require ('../../core/mailer.php');

    if(isset($email, $legajo)) {
        
        if(strlen($legajo) > 0) {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../../views/pages/recuperar-clave.php?error=invalidEmail");
            }
            else {
                include('../connection.inc');

                $query = "select * from usuarios where legajo like '".$legajo."'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));

                if(mysqli_num_rows($result) == 0) {
                    header("Location: ../../views/pages/recuperar-clave.php?error=noUserFound");
                }
                else {
                    $correo = 'utn@frro.com';

                    $caracteres = 'qwertyuiopasdfghjklzxcvbnm1234567890';
                    $nuevaClave = '';
                
                    for ($i = 1; $i <= 8; $i++) {
                        $nuevaClave .= $caracteres[random_int(0,35)];
                    }


                    $fila = mysqli_fetch_array($result);
                    
                    $query = "update usuarios set clave = '".$nuevaClave."' where legajo like '".$legajo."'";;
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));

                    $mensaje = 'Su nueva clave es '.$nuevaClave;
                    sendEmail($email, $correo, $mensaje, 3);

                    header("Location: ../../views/pages/recuperar-clave.php?success=true");
                }

            }
    
        }
        else {
            header("Location: ../../views/pages/recuperar-clave.php?error=noCode");
        }
    }
    else {
        header("Location: ../../views/pages/recuperar-clave.php?error=emptyFields");
    }
?>
<?php
    extract($_POST);

    if(isset($email, $legajo)) {
        
        if(strlen($legajo) > 0) {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../../views/pages/login.php?newPasswordSent=false");;
            }
            else {
                include('../connection.inc');

                $query = "select * from usuarios where legajo like '".$legajo."'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));

                if(mysqli_num_rows($result) == 0) {
                    echo 'error';
                }
                else {
                    $correo = 'utn@frro.com';

                    $caracteres = 'qwertyuiopasdfghjklzxcvbnm1234567890';
                    $nuevaClave = '';
                
                    for ($i = 1; $i <= 8; $i++) {
                        $nuevaClave .= $caracteres[random_int(0,35)];
                    }


                    $fila = mysqli_fetch_array($result);
                    
                    
                    $mensaje = 'Su nueva contraseña es '.$nuevaClave;
                    mail($email, $correo, $mensaje);
                    header("Location: ../../views/pages/login.php?newPasswordSent=true");
                }

            }
    
        }
        else {
            header("Location: ../../views/pages/login.php?newPasswordSent=false");;
        }
    }
    else {
        header("Location: ../../views/pages/login.php?newPasswordSent=false");;
    }
?>
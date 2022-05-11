<?php
    $fecha=date("d-m-Y");
    $hora=date("H :i:s");
    $destino=$_POST['email'];
    $asunto="¡$_POST['nombre'] te ha recomendado nuestro sitio!";
    $desde='From: php@gmail.com';
    $comentario= "
        \n
            Te recomiendo este sitio!

            Enviado: $fecha a las $hora\n
        \n
    ";
    mail($destino,$asunto,$comentario,$desde);
    echo "Su recomendación ha sido enviada..";
?>
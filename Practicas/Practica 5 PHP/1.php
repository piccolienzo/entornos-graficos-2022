<?php
    $destinatario = "alejocuello.w@gmail.com ";
    $asunto = "Ejercicio 1";
    $cuerpo = '
        <html>
            <head>
                <title>Envio de mail</title>
            </head>
            <body>
                <h1>Buenas!</h1>
                <p>
                    <b>Probando</b>.
                    Mail con formato html
                </p>
            </body>
        </html>
    ';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    
    mail($destinatario,$asunto,$cuerpo,$headers)
?>
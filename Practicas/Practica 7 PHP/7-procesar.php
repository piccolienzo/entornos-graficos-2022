<?php 
    session_start();
    //En esta sección iría todo el procesamiento de pago
    session_destroy(); 
?> 
<html> 
    <head> 
        <title>COMPRA FINALIZADA</title> 
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
        <style type="text/css"> 
            h1 { 
            font-family: Verdana, Arial, Helvetica, sans-serif; 
            font-size: 20px; 
            color: #990000; 
            }
        </style>
    </head> 
    
    <body>
        <h1 align="center">Procesado con éxito!</h1> 
        <a href="7-catalogo.php"> Volver al catalogo </a>
    </body> 
</html> 

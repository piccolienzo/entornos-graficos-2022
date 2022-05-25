<?php
    session_start();
    
    if(isset($_SESSION['nombre'])) {
        $nombre= $_SESSION['nombre'];
        echo("
            ¡Bienvenido ".$nombre."!"
        );
    }
    else {
        echo ("Su mail no se encuentra registrado. No puede acceder a esta página");
    }
    session_destroy();
    echo("<br> <a href='6-formulario.php'> Volver </a>");
?>
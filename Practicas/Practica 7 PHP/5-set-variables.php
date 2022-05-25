<?php
    session_start();
    extract($_REQUEST);

    $claveEncriptada = md5($clave);

    $_SESSION['usuario']  = $usuario;
    $_SESSION['clave'] = $claveEncriptada;

    echo('
        <p> Variables guardadas! </p>
        <a href="5-get-variables.php">
            <p>Avanzar a la siguiente página</p>
        </a>
    ');
?>
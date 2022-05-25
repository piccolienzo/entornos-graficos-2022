<?php
    session_start();
    echo("
        <p>Variables guardadas</p>
        <p>".$_SESSION['usuario']."</p>
        <p>".$_SESSION['clave']."</p>"
    );
    echo("
        <a href='5-formulario.php'>
            <p>Volver al formulario</p>
        </a>"
    );
?>
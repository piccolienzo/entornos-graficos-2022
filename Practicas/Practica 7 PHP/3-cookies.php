<?php
    if(isset($_POST["nombre"])){
        $nombre = $_POST["nombre"];
        setcookie("nombre", $nombre, time() + (60 * 60 * 24 * 90));
    }
    echo("
        <p> Gracias por completar el formulario! </p>
        <a href='3-formulario.php'>
            <p> Volver al formulario </p>
        </a>
    ");
?>
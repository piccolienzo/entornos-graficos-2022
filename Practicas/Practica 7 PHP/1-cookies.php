<?php
    if(isset($_POST["estilo"])){
        $estilo = $_POST["estilo"];
        setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
    } else{
        if (isset($_COOKIE["estilo"])){
            $estilo = $_COOKIE["estilo"];
        }
    }
    echo("
        <p> Color guardado! </p>
        <a href='1-formulario.php'>
            <p> Volver al formulario </p>
        </a>
    ");
?>
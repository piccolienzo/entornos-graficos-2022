<?php
    if(isset($_POST["titular"])){
        $titular = $_POST["titular"];
        setcookie("titular", $titular, time() + (60 * 60 * 24 * 90));
        echo("
            <p> Gracias por elegir un titular! </p>
        ");
    }
    else{
        echo("
            <p> No ha seleccionado ninguna opción! </p>            
        ");
    }
    echo("
        <a href='4-home.php'>
            <p> Volver al home </p>
        </a>
    ")
?>
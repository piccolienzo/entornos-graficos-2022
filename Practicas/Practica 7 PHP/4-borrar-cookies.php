<?php
    setcookie("titular", '', time() + (60 * 60 * 24 * 90));
    echo("
        <p> Cookies borradas! Ahora recibirá todas las noticias </p>
        <a href='4-home.php'>
            <p> Volver al home </p>
        </a>
    ");
?>
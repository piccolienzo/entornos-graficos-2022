<?php
    if (isset($_COOKIE["nombre"])) {
        $nombre = $_COOKIE["nombre"];
    }
    else{
        $nombre = '';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
    <head>
        <title>Cookies en PHP</title>
    </head>
    <body>
        <form action="3-cookies.php" method="post">
            <p>    
                Ingrese su nombre
            </p>
            <br>
            <input type="text" required name="nombre" value=
                <?php
                    echo($nombre);
                ?>
            >
            <input type="submit" value="Actualizar el estilo">
        </form>
    </body>
</html>
<?php
    session_start();
    
    include ("conexion.inc");

    $vMail = $_POST['mail'];
    $vSql = "SELECT * FROM alumnos WHERE mail ='$vMail' ";
    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
    $fila = mysqli_fetch_array($vResultado);
    if(mysqli_num_rows($vResultado) != 0) {
        $_SESSION['nombre']  = $fila['nombre'];
    }
    echo("Procesando... <br>");
    echo("<a href='6-get-variables.php'> Continuar </a>");
?>
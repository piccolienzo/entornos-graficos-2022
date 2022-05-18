<?php
    $link = mysqli_connect("localhost", "root", "admin") or die ("Problemas de conexión a la base de
    datos");
    mysqli_select_db($link, "entornos_tp6_capitales");
?>
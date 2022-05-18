<head>
    <title>Modificacion</title>
</head>
<body>
    <?php
        include ("conexion.inc");

        //Captura datos desde el Form anterior
        $ciudad = $_POST['ciudad'];
        $vPais = $_POST['pais'];
        $vHabitantes = $_POST['habitantes'];
        $vSuperficie = $_POST['superficie'];
        $vTieneMetro = $_POST['tieneMetro'];
        
        //Arma la instrucción SQL y luego la ejecuta
        $vSql = "UPDATE ciudades set ciudad='$vCiudad', pais='$vPais', habitantes='$vHabitantes',
         superficie='$vSuperficie', tiene_metro='$vTieneMetro', where ciudad='$vCiudad'";
        mysqli_query($link,$vSql) or die (mysqli_error($link));
        echo("La ciudad fue Modificada<br>");
        echo("<A href= 'Menu.html'>Volver al Menu del ABM</A>");
        // Cerrar la conexion
        mysqli_close($link);
    ?>
</body>
</html>
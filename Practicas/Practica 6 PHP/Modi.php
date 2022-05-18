<head>
    <title>Modificacion</title>
</head>
<body>
    <?php
        include ("conexion.inc");

        //Captura datos desde el Form anterior
        $vCiudad = $_POST['ciudad'];
        $vPais = $_POST['pais'];
        $vHabitantes = $_POST['habitantes'];
        $vSuperficie = $_POST['superficie'];
        if(isset($_POST['tieneMetro'])) {
            $vTieneMetro = 1;
        }
        else {
            $vTieneMetro = 0;
        }
        
        //Arma la instrucción SQL y luego la ejecuta
        $vSql = "UPDATE ciudades set ciudad='$vCiudad', pais='$vPais', habitantes='$vHabitantes',
         superficie='$vSuperficie', tiene_metro='$vTieneMetro' where ciudad ='$vCiudad'";
        mysqli_query($link,$vSql) or die (mysqli_error($link));
        echo("La ciudad fue Modificada<br>");
        echo("<A href= 'Menu.html'>Volver al Menu del ABM</A>");
        // Cerrar la conexion
        mysqli_close($link);
    ?>
</body>
</html>
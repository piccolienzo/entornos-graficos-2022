<html>
    <head>
        <title>Alta Usuario</title>
    </head>
    <body>
        <?php
            include("conexion.inc");

            //Captura datos desde el Form anterior
            $ciudad = $_POST['ciudad'];
            $vPais = $_POST['pais'];
            $vHabitantes = $_POST['habitantes'];
            $vSuperficie = $_POST['superficie'];
            $vTieneMetro = $_POST['tieneMetro'];
            //Arma la instrucción SQL y luego la ejecuta
            $vSql = "SELECT Count(nombre) as canti FROM capitales WHERE ciudad='$vCiudad'";
            $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
            $vCantCiudades = mysqli_fetch_assoc($vResultado);

            if ($vCantCiudades ['canti']!=0){
                echo ("Esa ciudad ya ha sido ingresada<br>");
                echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
            }
            else {
            $vSql = "INSERT INTO doc_utn (ciudad, pais, superficie, habitante, tiene_metro)
            values ('$ciudad','$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";
            mysqli_query($link, $vSql) or die (mysqli_error($link));
            echo("La ciudad fue registrada con éxito<br>");
            echo ("<A href='Menu.html'>VOLVER AL MENU</A>");
            // Liberar conjunto de resultados
            mysqli_free_result($vResultado);
            }
            // Cerrar la conexion
            mysqli_close($link);
        ?>
    </body>
</html>
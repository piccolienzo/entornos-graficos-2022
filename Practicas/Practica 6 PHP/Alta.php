<html>
    <head>
        <title>Alta Usuario</title>
    </head>
    <body>
        <?php
            include("conexion.inc");

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
            $vSql = "SELECT Count(ciudad) as canti FROM ciudades WHERE ciudad='$vCiudad'";
            $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
            $vCantCiudades = mysqli_fetch_assoc($vResultado);

            if ($vCantCiudades ['canti']!=0){
                echo ("Esa ciudad ya ha sido ingresada<br>");
                echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
            }
            else {
            $vSql = "INSERT INTO ciudades (ciudad, pais, superficie, habitantes, tiene_metro)
            values ('$vCiudad','$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";
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
<html>
    <head>
        <title>Prueba de PHP</title>
    </head>
    <body>
        <?php
            function sumar($sumando1,$sumando2){
                $suma=$sumando1+$sumando2;
                echo $sumando1."+".$sumando2."=".$suma;
            }
            sumar(5,6);
        ?>
    </body>
</html>
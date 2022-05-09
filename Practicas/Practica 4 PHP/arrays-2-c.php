<html>
    <head>
        <title>Prueba de PHP</title>
    </head>
    <body>
        <?php
            $matriz = array(5 => 1, 12 => 2);
            $matriz[] = 56;
            $matriz["x"] = 42; unset($matriz[5]); unset($matriz);
        ?>
    </body>
</html>
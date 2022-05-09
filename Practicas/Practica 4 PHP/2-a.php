<html>
    <head>
        <title>Prueba de PHP</title>
    </head>
    <body>
        <?php
            $i = 1;
            while ($i <= 10) {
            print ++$i;
            }

            $i = 1;
            while ($i <= 10):
            print $i;
            $i++;
            endwhile;

            $i = 0;
            do {
            print ++$i;
            } while ($i<10);
        ?>
    </body>
</html>
<html>
    <head>
        <title>Prueba de PHP</title>
    </head>
    <body>
        <?php
            if ($i == 0) {
                print "i equals 0";
                } elseif ($i == 1) {
                    print "i equals 1";
                } elseif ($i == 2) {
                    print "i equals 2";
            }

            switch ($i) {
                case 0:
                   print "i equals 0";
                    break;
                case 1:
                   print "i equals 1";
                    break;
                case 2:
                    print "i equals 2";
                    break;
            }                
        ?>
    </body>
</html>
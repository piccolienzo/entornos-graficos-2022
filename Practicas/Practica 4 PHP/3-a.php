<html>
    <head>
        <title>Prueba de PHP</title>
    </head>
    <body>
        <?php
            <?php
                echo "<table width = 90% border = '1' >";
                $row = 5;
                $col = 2;
                for ($r = 1; $r <= $row; $r++) {
                    echo "<tr>";
                    for ($c = 1; $c <= $col;$c++) {
                        echo "<td>&nbsp;</td>\n";
                    }
                    echo "</tr>\n";
                }
                echo "</table>\n";
            ?>
        ?>
    </body>
</html>
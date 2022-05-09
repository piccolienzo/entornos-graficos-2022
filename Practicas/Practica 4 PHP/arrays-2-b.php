<html>
    <head>
        <title>Prueba de PHP</title>
    </head>
    <body>
        <?php
            $matriz = array("unamatriz" => array(6 => 5, 13 => 9, "a" => 42));
            echo $matriz["unamatriz"][6];
            echo $matriz["unamatriz"][13];
            echo $matriz["unamatriz"]["a"]
        ?>
    </body>
</html>
<html>
    <head>
        <title>Prueba de PHP</title>
    </head>
    <body>
        <?php
            $fun = getdate();
            echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds]
            segundos, del $fun[mday]/$fun[mon]/$fun[year]";
        ?>
    </body>
</html>
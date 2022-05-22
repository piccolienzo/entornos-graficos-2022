<?php
    if (isset($_COOKIE["titular"])) {
        $titular = $_COOKIE["titular"];
    }
    else{
        $titular = '';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
    <head>
        <title>Cookies en PHP</title>
        <link rel="stylesheet" type="text/css" href="4-estilos.css">
    </head>
    <body>
        Bienvenido! Seleccione el tipo de titular que prefiera
        <form action="4-cookies.php" method="post">
            <p>    
                Aquí puedes seleccionar el estilo que prefieres en la página:
            </p>

            <br>
            <input type="radio" name="titular" value="politica">
            <label for="html">Política</label>
            <br>
            <input type="radio" name="titular" value="economica">
            <label for="html">Económica</label>
            <br>
            <input type="radio" name="titular" value="deportiva">
            <label for="html">Deportiva</label>
            <br>
            
            <br>
            <input type="submit" value="Enviar">
        </form>

        <a href="4-borrar-cookies.php">
            <p> Borrar cookies </p>
        </a>

        <section>
            <?php
                if($titular === 'politica' or $titular === '') {
                    echo('
                        <h1> Noticias políticas </h1>
                        <h2> Elecciones el domingo que viene </h2>
                        <p> Se votará por el nuevo presidente </p>
                        <h2> El partido demócrata realiza una encuesta para ver su posición </h2>
                        <p> Es una encuesta que pregunta sobre quién votará la gente </p>
                    ');
                }
                if($titular === 'economica' or $titular === '') {
                    echo('
                        <h1> Noticias de economía </h1>
                        <h2> La inflación anual supera el 55% </h2>
                        <p> Según el INDEC, este mes se alacanzó ese porcentaje, que afecta al bienestar de la sociedad </p>
                        <h2> El sueldo promedio de los programadores pasó el umbral de los $80000 mensuales </h2>
                        <p> Es uno de los rubros mejores pagos actualmente </p>
                    ');
                }
                if($titular === 'deportiva' or $titular === '') {
                    echo('
                        <h1> Noticias deportivas </h1>
                        <h2> Messi vuelve al Barcelona </h2>
                        <p> Tras pelearse con Mbappé, el jugador argentino volverá al club blaugrana </p>
                        <h2> Racing campeón de la Sudamericana 2022 </h2>
                        <p> El equipo de Gago, con su vistoso fútbol, derrotó en la final a San Pablo por 3-0 </p>
                    ');
                }
            ?>
        </section>
    </body>
</html>
<?php
    if($_SERVER['SERVER_NAME'] == "localhost"){
            $sv ="http://localhost/horariosconsulta";
    }
    else{
        $sv = "https://tpentornosgraficos.000webhostapp.com/HorariosConsulta/";
    }
?>

<footer class="footer">
    <div>
        <p class="footer-title">Universidad Tecnológica Nacional</p>
        <p class="footer-descripcion">Facultad Regional Rosario</p>
        
        <p class="footer-descripcion">
            <a href="<?php echo($sv) ?>/views/pages/mapa-sitio.php">Mapa del sitio</a>
        </p>
    </div>

    <div>
        <p class="footer-title">
            <a href="<?php echo($sv) ?>/views/pages/contacto.php">Contacto</a>
        </p>
        <p class="footer-descripcion">
            ZEBALLOS 1341 - S2000BQA -ROSARIO
        </p>
        <p class="footer-descripcion">
            EMAIL: contacto@frro.utn.edu.ar
        </p>
        <p class="footer-descripcion">
            TEL: 0341 4481871
        </p>
    </div>
</footer>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" /> 
        <link rel="stylesheet" href="styles/datepicker.css" /> 
        <link rel="stylesheet" href="styles/agendar-consulta.css" />
        <link rel="stylesheet" href="styles/tipo-consulta.css" />
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <title>Reagendar Consulta</title>
    </head>

    <body>

        <?php
            require('../components/header.php');
            extract($_GET);
        ?>

        <main class="container">
            <h1>Reagendar Consulta</h1>
            <h2 class="contador-pasos">(Paso 2 de 4)</h2>
            
            <section class="card">
    
                <form action="reprogramar-consulta-2.php" method="POST">
                <h3>Seleccione una Fecha *</h3>
                <?php 
                    $id = $_GET["id"];
                    echo "<input type='hidden' name='id' value='{$id}'>";
                    echo "<input type='hidden' name='fechaEspecial' id='fechaEspecial' value=''>";

                    function getNroDia($dia){
                        if($dia == "LUNES") return 1;
                        if($dia == "MARTES") return 2;
                        if($dia == "MIÉRCOLES") return 3;
                        if($dia == "JUEVES") return 4;
                        if($dia == "VIERNES") return 5;
                        if($dia == "SÁBADO") return 6;
                    }
                ?>
                
                <!-- Calendario -->
                <div id="d" ></div>

                <button type="submit" class="btn btn-violeta" style="margin-top: 10px">Continuar<span class="icon-entrar"></span></button>
            </form>
            
            </section>
        </main>

        <?php
            require('../components/footer.php');
            extract($_GET);
        ?>

        <script>
            $( function() {
                Date.prototype.addDays = function(days) {
                    var date = new Date(this.valueOf());
                    date.setDate(date.getDate() + days);
                    return date;
                }
                var dateToday = new Date(); 
                $( "#d" ).datepicker({
                    minDate: dateToday,
                    beforeShowDay: function(day) {
                    var day = day.getDay();
                    if (day == 0) {
                        return [false,""]
                    } else {
                        return [true, "puedeHabilitar"]
                    }
                    }
                });
                $("#fechaEspecial").val($( "#d" )[0].value);
            });

            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '< Ant',
                nextText: 'Sig >',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '', 
                onSelect: selectDate  
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);

            function selectDate(dateText) {
                $("#fechaEspecial").val(dateText);
            }
        </script>
    </body>
</html>
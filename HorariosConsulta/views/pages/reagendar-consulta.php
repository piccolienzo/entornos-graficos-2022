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
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <title>Agendar Consulta</title>
    </head>

    <body>

        <?php
            require('../components/header.php');
            extract($_GET);
        ?>

        <main class="container">
            <h1>Agendar Consulta</h1>
            <section class="card">
                <h2>Seleccione una Fecha</h2>
                <?php
                    function getNroDia($dia){
                        if($dia == "LUNES") return 1;
                        if($dia == "MARTES") return 2;
                        if($dia == "MIÉRCOLES") return 3;
                        if($dia == "JUEVES") return 4;
                        if($dia == "VIERNES") return 5;
                        if($dia == "SÁBADO") return 6;
                    }
                ?>
                <div id="d" ></div>
                <?php
                   echo("
                        <button type='button' onclick='continuar({$id})'> Continuar </button>
                   ")
                ?>
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
                var diaHabilitado = $("#dia").val();
                dateToday = dateToday.addDays(diaHabilitado - dateToday.getDay())
                $( "#d" ).datepicker({
                    minDate: dateToday,
                    beforeShowDay: function(day) {
                    var day = day.getDay();
                    if ([1,2,3,4,5,6].includes(day)) {
                        return [true, "puedeHabilitar"];
                    } else {
                        return [false,""];
                    }
                    }
                });
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
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);

            function continuar(id) {
                //pasar fecha
                window.location.href = "reprogramar-consulta.php?id=" + id;
            }
        </script>
    </body>
</html>
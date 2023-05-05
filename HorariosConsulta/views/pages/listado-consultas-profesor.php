<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/listado-consultas.css" /> 
    <link rel="stylesheet" href="styles/datepicker.css" /> 
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <title>Consultas</title>
    <?php   
        $alertText;
        if( isset($_GET['success']) ) {
            $alertText = "Consulta modificada con éxito";
        }
        if( isset($alertText) ) {
            echo("
                <script type='text/javascript'>
                    window.onload = function() {
                        alert('".$alertText."')
                    };
                </script>
            ");
        }
    ?>
</head>

<body>

<?php
    require('../components/header.php');
?>

<main class="container">
    <h1>Mis consultas</h1>
<section class="card" id="card">

<?php
    if(isset($_SESSION["resultados_consulta"])){
        $result = $_SESSION["resultados_consulta"];
        if(count($result)) {
            include('../../controllers/getNextDay.inc');
            include('../../controllers/sortByDate.inc');
            usort($result, 'sortByDate');

            $nrosDias = array();

            function getNroDia($dia){
                if($dia == "LUNES") return 1;
                if($dia == "MARTES") return 2;
                if($dia == "MIÉRCOLES") return 3;
                if($dia == "JUEVES") return 4;
                if($dia == "VIERNES") return 5;
                if($dia == "SÁBADO") return 6;
            }

            foreach($result as $x => $a){ 
                array_push($nrosDias, getNroDia($a["dia"]));
            }

            $firstConsultation = array_shift($result);
            $modalidad = $firstConsultation['esVirtual']?'Virtual':'Presencial';

            echo ("
                <div>
                    <p> <b> Visualizar consultas: </b> </p>
                    <input class='horizontal no-margen-derecho' type='radio' id='listado' name='searchtype' value='listado' checked>
                    <label class='horizontal' for='listado'><b> Listado </b></label>
                    <input class='horizontal no-margen-derecho' type='radio' id='calendario' name='searchtype' value='calendario'>
                    <label class='horizontal' for='calendario'><b> Calendario </b></label>
                </div>
                <div id='d'style='margin-top: 20px; display: none' ></div>
                <table id='t'>
                    <thead>
                        <tr>
                            <th>Próxima consulta</th>
                        </tr>
                    </thead>

                    <tbody class='tb'>
                        <tr>
                            <td>{$firstConsultation["matNombre"]}, ".getNextDay($firstConsultation['dia'])['label'].", {$modalidad}</td>
                            <td>
                                <button class='btn btn-listado' onclick='verDetalles({$firstConsultation['id']})' >Ver detalles</button>
                            </td>                       
                        </tr> 
                    <tbody>
            ");
        
            if(count($result)) {
                echo ("
                    <thead>
                        <tr>
                            <th>Listado de consultas</th>
                        </tr>
                    </thead>
                ");

                foreach($result as $x => $a){ 

                    $modalidad = $a['esVirtual']?'Virtual':'Presencial';
                    echo "
                        <tbody class='tb'>
                            <tr>
                                <td>{$a["profNombre"]}, {$a["matNombre"]}, ".getNextDay($a['dia'])['label'].", {$modalidad}</td>
                                <td>
                                    <button class='btn btn-detalles' onclick='verDetalles({$a['id']})' >Ver detalles</button>
                                </td>                       
                            </tr> 
                        <tbody>        
                    ";
                }
            }

            echo("
                </table>
            ");

        }
        else {
            echo("
                <p>No se han encontrado resultados</p>
            ");
        }

    }
    else {
        header("Location: ../../controllers/consultations/consultations.php?teacher=true");
    }
?>

</section>
</main>
<?php
    require('../components/footer.php')
?>

<script>
    function verDetalles(id){
        window.location.href = "../../controllers/consultations/consultation.php?id=" + id;
    }

    const radios = document.querySelectorAll('input[type="radio"]');

    radios.forEach(radio => {
    radio.addEventListener('change', (event) => {
        document.getElementById("t").style.display = (event.target.value == 'calendario') ? "none" : "table";
        document.getElementById("d").style.display = (event.target.value == 'calendario') ? "flex" : "none";
        document.getElementById("card").style.height = (event.target.value == 'calendario') ? "600px" : "auto";
    });
    });

    $( function() {
                Date.prototype.addDays = function(days) {
                    var date = new Date(this.valueOf());
                    date.setDate(date.getDate() + days);
                    return date;
                }
                var dateToday = new Date(); 

                var diaHabilitado = <?php echo json_encode($nrosDias); ?>

                $( "#d" ).datepicker({
                    minDate: dateToday,
                    beforeShowDay: function(day) {
                    var day = day.getDay();
                        if (!diaHabilitado.includes(day)) {
                            return [false,""]
                        } else {
                            return [true, "puedeHabilitar"]
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
</script>
</body>
</html>
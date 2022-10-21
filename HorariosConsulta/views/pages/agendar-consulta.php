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
    require('../components/header.php')
?>

<main class="container">
    <h1>Agendar Consulta</h1>
<section class="card">
    
    <form action="../../controllers/inscriptionsConsultations/create.php" method="POST">
    <h2>Seleccione una Fecha</h2>
<?php 
    $consultas = $_SESSION["resultados_consulta"];
    $id = base64_decode($_GET["id"]);
    $idUsuario = $_SESSION["usuario"]["id"];
    $consulta = array_search( $id, array_column($consultas, 'id'));
    if(isset($_GET["id"])){
        echo "<input type='hidden' name='idConsulta' value='{$id}'>";
        echo "<input type='hidden' name='idAlumno' value='{$idUsuario}'>";
        echo "<input type='hidden' name='fechaConsulta' id='fechaConsulta' value=''>";
        $dia = getNroDia($consultas[$consulta]["dia"]);
        $hora = $consultas[$consulta]["horaInicio"];
        echo "<input type='hidden' id='dia' value='{$dia}'>";
        echo "<input type='hidden' name='hora' value='{$hora}'>";

    }
    $modalidad = $consultas[$consulta]["esVirtual"]?"Virtual":"Presencial";
    echo "<ul class='infoconsulta'>
        <li><b>Profesor: </b>{$consultas[$consulta]['profNombre']}</li>
        <li><b>Modalidad: </b> {$modalidad}</li>
        <li><b>Materia: </b>{$consultas[$consulta]['matNombre']}</li>
        <li><b>Día: </b> {$consultas[$consulta]["dia"]}</li>
    </ul>";
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

    <input type="submit" class="btn btn-violeta" value="Confirmar" />
   </form>
 
</section>
</main>
<?php
    require('../components/footer.php')
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
            if (day != diaHabilitado) {
                return [false,""]
            } else {
                return [true, "puedeHabilitar"]
            }
            }
        });
        $("#fechaConsulta").val($( "#d" )[0].value);
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
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        onSelect: selectDate  
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);

    function selectDate(dateText) {
        $("#fechaConsulta").val(dateText);
    }

    

</script>
</body>
</html>
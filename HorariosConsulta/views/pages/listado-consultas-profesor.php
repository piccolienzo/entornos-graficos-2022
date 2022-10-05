<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/listado-consultas.css" /> 
    <title>Consultas</title>
</head>

<body>

<?php
    require('../components/header.php');
?>

<main class="container">
    <h1>Mis consultas</h1>
<section class="card">

<?php
    if(isset($_SESSION["resultados_consulta"])){
        $result = $_SESSION["resultados_consulta"];
        if(count($result)) {
            include('../../controllers/getNextDay.inc');
            include('../../controllers/sortByDate.inc');
            usort($result, 'sortByDate');

            $firstConsultation = array_shift($result);
            $modalidad = $firstConsultation['esVirtual']?'Virtual':'Presencial';

            echo ("
                <label for='listado' class='check'> Listado </label>
                <input type='radio' id='listado' name='searchtype' value='listado' checked>
                <label for='calendario' class='check'> Calendario </label>
                <input type='radio' id='calendario' name='searchtype' value='calendario'>
                <table>
                    <thead>
                        <tr>
                            <th>Próxima consulta</th>
                        </tr>
                    </thead>

                    <tbody class='tb'>
                        <tr>
                            <td>{$firstConsultation["profNombre"]}, {$firstConsultation["matNombre"]}, ".getNextDay($firstConsultation['dia'])['label'].", {$modalidad}</td>
                            <td>
                                <button class='btn btn-detalles' onclick='verDetalles({$firstConsultation['id']})' >Ver detalles</button>
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
    let backurl = "";
    (function() {
        document.querySelector("#volver").style.display = "block";
        document.querySelector("#volver").addEventListener("click", back);      
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        backurl = urlParams.get('backurl');
    })();

    function back(){
        window.location.href = "../../index.php";
    }

    function verDetalles(id){
        let element = document.querySelector("#r"+id);
        let init = element.style.display;
        if(element.style.display === "none"){
            element.style.display = "table-row-group";
        }
        else{
            element.style.display = "none"
        }
         
    }

    function agendarConsulta(id){
        window.location.href = "agendar-consulta.php?id="+btoa(id)+"&backurl="+btoa(window.location.href);
    }
</script>
</body>
</html>
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
    require('../components/header.php')
?>

<main class="container">
    <h1>Listado de Consultas</h1>
<section class="card">

<?php
    if(isset($_SESSION["resultados_consulta"])){
        $result = $_SESSION["resultados_consulta"];
        if(count($result)) {
            
            echo ("
            <table>
                <thead>
                    <tr>
                        <th>Profesor</th>
                        <th>Materia</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>
            ");
        
            foreach($result as $x => $a){ 
                $modalidad = $a['esVirtual']?'Virtual':'Presencial';
                $agendarConsulta = isset($_SESSION['usuario'])
                    ? "<div><button class='btn btn-violeta' onclick='agendarConsulta({$a['id']})'>Agendar Consulta</button></div>"
                    : "";
                echo "
                <tbody class='tb'>
                    <tr>
                        <td>{$a["profNombre"]}</td>
                        <td>{$a["matNombre"]}</td>
                        <td>
                            <button class='btn btn-detalles' onclick='verDetalles({$a['id']})' >Ver detalles</button>
                        </td>                       
                    </tr> 
                <tbody>  
                <tbody class='ht' style='display:none;' id='r{$a['id']}'> 
                    <tr>
                        <td colspan='3'>
                            <div>  Horarios disponibles </div>
                            <div>  {$a['dia']} {$a['horaInicio']} a {$a['horaFin']} </div>
                            <div> Email: {$a['email']} </div>
                            <div>Modalidad: {$modalidad} </div>
                            {$agendarConsulta}
                        </td>
                    </tr> 
                </tbody>                                
                    ";
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
        window.location.href = atob(backurl);
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/listado-consultas.css" /> 
    <title>Mis Consultas</title>
</head>

<body>

<?php
    require('../components/header.php');
    require("../../controllers/inscriptionsConsultations/alumn-inscription.php");
?>

<main class="container">
    <h1>Mis consultas</h1>
<section class="card">

<?php
    if(isset($_SESSION["resultados_consulta"])){
        $isStudent = false;
        if(isset($_SESSION['role']) && isset($_SESSION['usuario']) ) {
            $isStudent = $_SESSION['role'] == 'alumno' ? true : false;
    
            if($isStudent){
                $result = getConsultasAlumno();
            }
            
        }else{
            echo "usuario no logeado";
        }
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
                $cancelarConsulta = $isStudent
                    ? "<div><button class='btn btn-rojo' onclick='cancelarConsulta({$a['id']})'>Cancelar Consulta</button></div>"
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
                            <div>  {$a['dia']} {$a['horaInicio']} a {$a['horaFin']} </div>
                            <div> Email: {$a['email']} </div>
                            <div>Modalidad: {$modalidad} </div>
                            {$cancelarConsulta}
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
    else {
        header("Location: ../../controllers/consultations/consultations.php");
    }
?>

</section>
</main>
<?php
    require('../components/footer.php')
?>

<script>

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

    function cancelarConsulta(id){
        //window.location.href = "agendar-consulta.php?id=" + btoa(id)+"&backurl=" + btoa(window.location.href);
    }
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/header.css" /> 
    <link rel="stylesheet" href="styles/footer.css" /> 
    <link rel="stylesheet" href="styles/listado-consultas.css" /> 
    <title>Consultas</title>
</head>

<body>

<?php
    require('../components/header.php');

    $isStudent = false;

    if(isset($_SESSION['role'])) {
        $isStudent = $_SESSION['role'] == 'alumno' ? true : false;
    }
?>

<main class="container">
    <h1>Listado de consultas</h1>
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
                $agendarConsulta = ( $isStudent && !isset($a['motivoSuspension']) )
                    ? "
                        <div style='margin: 7px; text-align: right'>
                            <button class='btn btn-violeta' style='width: 127px;' onclick='agendarConsulta({$a['id']})'>
                                Agendar <span class='icon-entrar'></span>
                            </button>
                        </div>
                    "
                    : "";
                echo "
                <tbody class='tb'>
                    <tr>
                        <td>{$a["profNombre"]}</td>
                        <td>{$a["matNombre"]}</td>
                        <td>
                            <button class='btn btn-listado' onclick='verDetalles({$a['id']})' >Ver detalles</button>
                        </td>                       
                    </tr> 
                <tbody>  
                <tbody class='ht' style='display:none;' id='r{$a['id']}'> 
                    <tr>
                        <td colspan='3'>";
                            if(!isset($a['motivoSuspension']) ){
                                if(isset($a['fechaEspecial']) && $a['fechaEspecial'] > date("Y-m-d") ){
                                    echo "<div style='margin: 7px'>  <b style='color:red'>Fecha especial:</b> {$a['fechaEspecial']}, de ".substr($a['horaInicioEspecial'],0,-3)." a ".substr($a['horaFinEspecial'],0,-3)."</div>";
                                }
                                else {
                                    echo "<div style='margin: 7px'>  <b>Horarios disponibles:</b> {$a['dia']} ".substr($a['horaInicio'],0,-3)." a ".substr($a['horaFin'],0,-3)."</div>";
                                }
                            }
                            else{
                                echo "<div style='margin: 7px'>  <b style='color:red'>Consulta suspendida</b></div>";
                                echo "<div style='margin: 7px'>  <b style='color:red'>Motivo de suspensión:</b> {$a['motivoSuspension']}</div>";
                            }
                            if(isset($a['comentarioSuspension']) ){
                                echo "<div style='margin: 7px'>  <b style='color:red'>Comentario:</b> {$a['comentarioSuspension']}</div>";
                            }
                            if(!isset($a['motivoSuspension']) ){
                                echo "
                                <div style='margin: 7px'> <b>Email:</b> {$a['email']} </div>
                                <div style='margin: 7px'> <b>Modalidad:</b> {$modalidad} </div>
                                {$agendarConsulta}";
                            }
                        echo"
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

    function agendarConsulta(id){
        window.location.href = "agendar-consulta.php?id=" + btoa(id)+"&backurl=" + btoa(window.location.href);
    }
</script>
</body>
</html>
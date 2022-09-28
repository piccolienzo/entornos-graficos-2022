<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" /> 
        <link rel="stylesheet" href="styles/listado-consultas.css" /> 
        <title>Usuarios</title>
        <?php   
            $alertText;
            if( isset($_GET['success']) ) {
                $errorType = $_GET['success'];
                if($errorType == 'edit')  $alertText = "Usuario editado con éxito";
                if($errorType == 'disabled')  $alertText = "Usuario deshabilitado con éxito";
                if($errorType == 'enabled')  $alertText = "Usuario habilitado con éxito";
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

    <?php
        $errorText;
        
        if( isset($_GET['success']) ) {
            $errorText = "Modificado exitosamente";
        }

        if( isset($errorText) ) {
            echo("
                    <script type='text/javascript'>
                        window.onload = function() {
                            alert('".$errorText."')
                        };
                    </script>
            ");
        }
    ?>

    <?php
        extract($_GET);

        include("../../controllers/connection.inc");
        
        $query = "select m.nombre matNombre ,u.nombre profNombre, u.apellido, u.email, c.esVirtual,c.id,c.dia,c.horaInicio,c.horaFin,c.cupo , c.id, c.cancelado
            from materias m
            inner join profesores_materias pm on m.id = pm.idMateria
            inner join profesores p on p.idUsuario = pm.idProfesor
            inner join usuarios u on u.id = p.idUsuario
            inner join consultas c on c.idProfesorMateria = pm.id ";

        $query.=  " order by horaInicio";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        $array = array();
        while($row = mysqli_fetch_array($result)){
            array_push($array, $row);
        }

        mysqli_close($link);
    ?>

    <body>

    <?php
        require('../components/header.php')
    ?>

        <main class="container">
            <h1>Listado de Consultas</h1>
            <section class="card">

            <?php
                if(count($array)) {   
                    echo ("
                    <table>
                        <thead>
                            <tr>
                                <th>Profesor</th>
                                <th>Materia</th>
                                <th>Día</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                            </tr>
                        </thead>
                    ");
                
                    foreach($array as $x => $a){ 
                        $cancelAction = $a['cancelado'] ? 'Habilitar' : 'Suspender';
                        $modalidad = $a['esVirtual'] ? 'Virtual' : 'Presencial';
                        echo "
                            <tbody class='tb'>
                                <tr>
                                    <td>{$a["profNombre"]}</td>
                                    <td>{$a["matNombre"]}</td>
                                    <td>{$a["dia"]}</td>
                                    <td>{$a["horaInicio"]}</td>
                                    <td>{$a["horaFin"]}</td>
                                    <td>
                                        <button class='btn btn-detalles' onclick='suspender({$a['id']},{$a['cancelado']})' >{$cancelAction}</button>
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
                        <p>No se encontraron resultados</p>
                    ");
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

            function suspender(id, cancelado) {
                window.location.href = "../../controllers/consultations/suspend.php?id=" + id + "&cancelado=" + cancelado;
            }

            function agendarConsulta(id){
                window.location.href = "agendar-consulta.php?id="+btoa(id)+"&backurl="+btoa(window.location.href);
            }
        </script>
    </body>
</html>
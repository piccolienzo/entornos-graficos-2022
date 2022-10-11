<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" />
        <link rel="stylesheet" href="styles/login.css" /> 
        <title>Detalle de consulta</title>
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

    <body>

        <?php
            require('../components/header.php');
            $role = '';
            if( isset( $_SESSION['role']) ) {
                $role = $_SESSION['role'];
            }
        ?>

        <main class="container">

            <button>Imprimir</button>
            <h1>Detalle Consultas</h1>
            
            <?php
                if(isset($_SESSION["resultado_consulta"])){
                    $consultations = $_SESSION["resultado_consulta"];
                    if(count($consultations)) {                
                        foreach($consultations as $x => $a){
                            $cancelAction = $a['cancelado'] ? 'Habilitar Consulta' : 'Suspender Consulta';
                            $modalidad = $a["esVirtual"] ? "Virtual" : "Presencial";
                            echo("
                                <p>Día: ".$a["dia"]."</p>
                                <p>Hora: ".substr($a["horaInicio"], 0, -3)." - ".substr($a["horaFin"], 0, -3)."</p>
                                <p>Materia: ".$a["matNombre"]."</p>
                                <p>Modalidad: ".$modalidad."</p>
                                <p>Lugar: ".$a["lugar"]."</p>
                                <p>Profesor: ".$a["profNombre"]."</p>
                                
                                ");
                            if( $role == 'administrador' ) {
                                echo("
                                    <button onclick='suspender({$a['id']},{$a['cancelado']})'>{$cancelAction}</button>
                                    <button onclick='editar({$a['id']})'>Modificar</button>
                                ");
                            }
                            else if( $role == 'profesor' ) {
                                echo("
                                    <button onclick='suspenderComoProfesor({$a['id']},{$a['cancelado']})'>{$cancelAction}</button>
                                ");

                                $typeSearch = 'consultas';
                                $id = $a['id'];
                                require('../../controllers/inscriptionsConsultations/inscriptions.php');
                                if(count($array)) { 
                                    echo("
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Listado de alumnos</th>
                                                </tr>
                                            </thead>
                                    ");

                                    foreach($array as $x => $a){ 
                                        echo("
                                                <tr>
                                                    <td>{$a["nombre"]} {$a["apellido"]}</td>
                                                    <td>{$a["email"]}</td>
                                                </tr> 
                                        ");
                                    }

                                    echo("
                                        </table>
                                    ");
                                }
                                else {
                                    echo("
                                       <p>No hay inscriptos en tu cosulta</p>
                                    ");
                                }
                            }
                        }
                    }
                    else {
                        echo( "<p>Hubo un error al obtener el detalle de la consulta</p>");
                    }
                }
            ?>

        </main>

        <script>

            const currentUrl = btoa(window.location.href);

            function suspender(id, cancelado) {
                window.location.href = "../../controllers/consultations/suspend.php?id=" + id + "&cancelado=" + cancelado + "&backurl=" + backurl;
            }
            
            function suspenderComoProfesor(id, cancelado) {
                if(!cancelado) {
                    window.location.href = "suspender-consulta.php?id=" + id + "&backurl=" + currentUrl;
                }
                else {
                    suspender(id, cancelado)
                }
            }

            function editar(id) {
                window.location.href = "../../controllers/teachers/teachers.php?nextPage=listado-profesores.php&id=" + id + "&backurl=" + currentUrl;
            }

        </script>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
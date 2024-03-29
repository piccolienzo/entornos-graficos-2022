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
            require('../../controllers/amFunction.inc.php');
            $role = '';
            if( isset( $_SESSION['role']) ) {
                $role = $_SESSION['role'];
            }
        ?>

        <main class="container listado">

            <h1>Detalle Consultas</h1>
            
            <section class="card">
                <div class='derecha'>
                    <button type="button" id="btnPrint" class="btn-print" title="Imprimir comprobante" onclick="imprimir()">
                    <span class="print"></span>
                </div>
                </button>

                <?php
                    if(isset($_SESSION["resultado_consulta"])){
                        $consultations = $_SESSION["resultado_consulta"];
                        if(count($consultations)) {                
                            foreach($consultations as $x => $a){
                                $cancelAction = $a['cancelado'] ? 'Habilitar' : 'Suspender';
                                $modalidad = $a["esVirtual"] ? "Virtual" : "Presencial";
                                echo("
                                    <div class='detalle-consulta' id='datosAImprimir'>
                                        <p>Día:<b> ".$a["dia"]."</b></p>
                                        <p>Hora:<b> ".substr($a["horaInicio"], 0, -3).getAmOrPm($a["horaInicio"])." - ".substr($a["horaFin"], 0, -3).getAmOrPm($a["horaFin"])."</b></p>
                                        <p>Materia:<b> ".$a["matNombre"]."</b></p>
                                        <p>Modalidad:<b> ".$modalidad."</b></p>
                                        <p>Lugar:<b> ".$a["lugar"]."</b></p>
                                        <p>Profesor:<b> ".$a["profNombre"]." ".$a["profApellido"]."</b></p>
                                ");
                                    
                                if(isset($a['fechaEspecial']) && $a['fechaEspecial'] > date("Y-m-d") ){
                                    echo "<p style='margin: 7px'>  <b style='color:red'>Fecha especial:</b> {$a['fechaEspecial']}, de ".substr($a['horaInicioEspecial'],0,-3)." a ".substr($a['horaFinEspecial'],0,-3)."</p>";
                                }
                                        
                                echo("</div>
                                    
                                    ");
                                if( $role == 'administrador' ) {
                                    echo("
                                        <div class='contenedor-centro'>
                                            <button class='btn btn-rojo' style='text-align: center' onclick='suspender({$a['id']},{$a['cancelado']})'>{$cancelAction}</button>
                                            <button class='btn btn-azul' style='text-align: center' onclick='editar({$a['id']})'>Modificar</button>
                                        </div>
                                    ");
                                }
                                else if( $role == 'profesor' ) {
                                    if ( isset($a['fechaEspecial']) ) {
                                        echo("
                                            <div class='derecha'>
                                                <button class='btn btn-rojo' style='text-align: center' onclick='quitarSuspension({$a['id']})'>Habilitar</button>
                                            </div>
                                        ");
                                    }
                                    else {
                                        echo("
                                            <div class='derecha'>
                                                <button class='btn btn-rojo' style='text-align: center' onclick='suspenderComoProfesor({$a['id']},{$a['cancelado']})'>{$cancelAction}</button>
                                            </div>
                                        ");
                                    }

                                    $typeSearch = 'consultas';
                                    $id = $a['id'];
                                    require('../../controllers/inscriptionsConsultations/inscriptions.php');
                                    if(count($array)) { 
                                        echo("
                                            <table id='datosAImprimir2'>
                                                <thead>
                                                    <tr>
                                                        <th>Listado de alumnos para la próxima consulta</th>
                                                    </tr>
                                                </thead>
                                        ");

                                        foreach($array as $x => $a){ 
                                            echo("
                                                    <tbody class='tb'>
                                                        <tr>
                                                            <td>{$a["nombre"]} {$a["apellido"]}</td>
                                                            <td>{$a["email"]}</td>
                                                        </tr> 
                                                    </tbody>
                                            ");
                                        }

                                        echo("
                                            </table>
                                        ");
                                    }
                                    else {
                                        echo("
                                        <p><u>No hay inscriptos en tu próxima cosulta</u></p>
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
            </section>

        </main>

        <script>

            function imprimir() {
                let divContents = document.getElementById("datosAImprimir").innerHTML;
                let divContents2 = document.getElementById("datosAImprimir2")?.innerHTML;
                let printWindow = window.open('', '_blank', 'fullscreen="yes"');
                printWindow.document.write('<html><head><title>Consulta</title>');
                printWindow.document.write('</head><body > <h1>Detalle de consulta</h1>');
                printWindow.document.write(divContents);
                if(divContents2) printWindow.document.write(divContents2);
                printWindow.document.close();
                printWindow.print();
            };

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

            function quitarSuspension(id) {
                window.location.href = "../../controllers/consultations/cancel-suspend.php?id=" + id + "&backurl=" + backurl;
            }

        </script>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
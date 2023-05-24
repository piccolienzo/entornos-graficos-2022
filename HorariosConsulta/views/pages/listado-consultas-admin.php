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
            <h1>Listado de Consultas</h1>
            <section class="card">

            <form action="../../controllers/consultations/consultations.php" method="GET">
                <div style="padding: 8px" class="formulario">
                    <button type="button" id="btnPrint" class="btn-print" title="Imprimir comprobante" onclick="imprimir()">
                        <span class="print"></span>
                    </button>
                    <button type='button' class='btn btn-violeta btn-largo-medio' style="text-align: center" onclick="nuevaConsulta()">Nueva consulta</button>
                    <input type="text" id="nombre" name="search" placeholder="Buscar por profesor" style="margin-left: 20px"/>
                    <button class='btn btn-violeta' type="submit" style="text-align: center">Buscar</button>
                </div>

                <div style="padding: 4px">
                    <!-- <b> Agrupar por </b>
                    <label for="profesor" class="check" style="margin-left: 10px">
                        <input type="radio" id="profesor" name="searchtype" value="profesor" checked>
                        Profesor
                    </label>
                    <label for="materia" class="check">
                        <input type="radio" id="materia" name="searchtype" value="materia">
                        Materia
                    </label> -->
                    <input type="radio" id="profesor" name="searchtype" value="profesor" checked style="display: none">
                    <input type="radio" id="profesor" name="admin" value="true" checked style="display: none">

                    <!-- <label for="fecha" style="margin-left: 20px"><b> Fecha </b></label>
                    <input type="date" id="fecha" name="date"> -->
                </div>
            </form>

            <?php
                if(isset($_SESSION["resultados_consulta"])){
                    $result = $_SESSION["resultados_consulta"];
                    if(count($result)) {   
                            include('../../controllers/getNextDay.inc');
                            include('../../controllers/sortByDate.inc');
                            usort($result, 'sortByDate');
                            
                            echo ("
                                <table id='datosAImprimir'>
                            ");
                        
                            foreach($result as $x => $a){ 
                                $modalidad = $a['esVirtual']?'Virtual':'Presencial';
                                echo "
                                    <tbody class='tb'>
                                        <tr>
                                            <td>{$a["matNombre"]}, {$a["profNombre"]}, {$a["dia"]}, {$modalidad}, Próxima: ".getNextDay($a['dia'])['label']."</td>
                                            <td>
                                                <button class='btn-listado' onclick='verDetalles({$a['id']})' >Ver detalle</button>
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
                }
                else {
                    header("Location: ../../controllers/consultations/consultations.php?admin=true");
                }

            ?>

            </section>
        </main>
        <?php
            require('../components/footer.php')
        ?>

        <script>
            
            const currentUrl = btoa(window.location.href);

            function verDetalles(id) {
                window.location.href = "../../controllers/consultations/consultation.php?id=" + id + "&backurl=" + currentUrl;
            }

            function nuevaConsulta() {
                window.location.href = "../../controllers/teachers/teachers.php?nextPage=listado-profesores.php?backurl=" + currentUrl;
            }

            function imprimir() {

                var botones = document.getElementsByClassName('btn-listado');

                for (var i = 0; i < botones.length; i++) {
                    botones[i].style.display = 'none';
                }

                let divContents = document.getElementById("datosAImprimir").innerHTML;
                let printWindow = window.open('', '_blank', 'fullscreen="yes"');
                printWindow.document.write('<html><head><title>Usuarios</title>');
                printWindow.document.write('</head><body > <h1>Listado de usuarios</h1>');
                printWindow.document.write(divContents);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();

                for (var i = 0; i < botones.length; i++) {
                    botones[i].style.display = 'block';
                }
            };
            
        </script>
    </body>
</html>
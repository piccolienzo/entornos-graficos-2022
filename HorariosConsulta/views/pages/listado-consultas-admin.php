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

            <form class="formulario" action="../../controllers/consultations/consultations.php" method="GET">

                <button class='btn btn-violeta'>Imprimir</button>
                <button type='button' class='btn btn-violeta' onclick="nuevaConsulta()">Nueva consulta</button>
                <input type="text" id="nombre" name="search"/>
                <button class='btn btn-violeta' type="submit">Buscar</button>

                <label> Filtrar por </label>
                <label for="profesor" class="check"> Profesor </label>
                <input type="radio" id="profesor" name="searchtype" value="profesor" checked>
                <label for="materia" class="check"> Materia </label>
                <input type="radio" id="materia" name="searchtype" value="materia">
                
                <input type="radio" id="profesor" name="admin" value="true" checked style="display: none">

                <label for="fecha"> Fecha </label>
                <input type="date" id="fecha" name="date">

            </form>

            <?php
                if(isset($_SESSION["resultados_consulta"])){
                    $result = $_SESSION["resultados_consulta"];
                    if(count($result)) {   
                            include('../../controllers/getNextDay.inc');
                            include('../../controllers/sortByDate.inc');
                            usort($result, 'sortByDate');
                            
                            echo ("
                                <table>
                            ");
                        
                            foreach($result as $x => $a){ 
                                $modalidad = $a['esVirtual']?'Virtual':'Presencial';
                                echo "
                                    <tbody class='tb'>
                                        <tr>
                                            <td>{$a["matNombre"]}, {$a["profNombre"]}, {$a["dia"]}, {$modalidad}, Próxima: ".getNextDay($a['dia'])['label']."</td>
                                            <td>
                                                <button class='btn btn-detalles' onclick='verDetalles({$a['id']})' >Ver detalle</button>
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
            
        </script>
    </body>
</html>
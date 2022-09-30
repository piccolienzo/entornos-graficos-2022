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
                <button class='btn btn-violeta'>Nueva consulta</button>
                <input type="text" id="nombre" name="search"/>
                <button class='btn btn-violeta' type="submit">Buscar</button>

                <label> Filtrar por </label>
                <label for="materia" class="check"> Profesor </label>
                <input type="radio" id="materia" name="searchtype" value="profesor" checked>
                <label for="profesor" class="check"> Materia </label>
                <input type="radio" id="profesor" name="searchtype" value="materia">
                
                <input type="radio" id="profesor" name="admin" value="true" checked style="display: none">

                <label for="fecha"> Fecha </label>
                <input type="date" id="fecha" name="date">

            </form>

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
                                            <th>Día</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                        </tr>
                                    </thead>
                            ");
                        
                            foreach($result as $x => $a){ 
                                echo "
                                    <tbody class='tb'>
                                        <tr>
                                            <td>{$a["profNombre"]}</td>
                                            <td>{$a["matNombre"]}</td>
                                            <td>{$a["dia"]}</td>
                                            <td>{$a["horaInicio"]}</td>
                                            <td>{$a["horaFin"]}</td>
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
            
            function verDetalles(id) {
                window.location.href = "../../controllers/consultations/consultation.php?id=" + id;
            }

            
        </script>
    </body>
</html>
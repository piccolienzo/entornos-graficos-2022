<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../static/css/global.css" /> 
        <link rel="stylesheet" href="../../static/css/suspender-consulta.css" /> 
        <title>Listado de consultas</title>
    </head>

    <body>

        <?php
            require('../components/header.php');
            include('../../controllers/getNextDay.inc');
            extract($_GET);
            $consultation = $_SESSION["resultado_consulta"][0];
        ?>

        <main class="container">
            <h1>Suspender Consulta</h1>
            <h2 class="contador-pasos">(Paso 1)</h2>
            <section class="card">
                <?php
                    $esVirtual = $consultation["esVirtual"] ?  "Virtual" : "Presencial";
                    echo("<p>".$consultation["matNombre"].", ".getNextDay($consultation['dia'])['label'].", ".$esVirtual."</p>");
                ?>
                <form class="formulario" action="../../controllers/consultations/pre-suspend.php" method="post">
                    <h2>¿Desea reprogramar esta consulta para una fecha especial?</h2>
                    <div class="contenedor-botones">
                        <?php
                            echo("
                                <input type='button' class='btn btn-rojo' style='text-align: center; margin: 5px' name='boton' value='No' id='boton-no' onclick='suspender({$id})'></button>
                                <input type='button' class='btn' style='text-align: center; margin: 5px' name='boton' value='Si' id='boton-si' onclick='editar({$id})'></button>
                            ")
                        ?>
                    </div>
                </form>
            </section>
        </main>

        <script>
            function suspender(id) {
                window.location.href = "suspender-consulta-2.php?id=" + id;
            }

            function editar(id) {
                window.location.href = "reagendar-consulta.php?id=" + id;
            }
        </script>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
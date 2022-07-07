<!DOCTYPE html>
<html lang="en">
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
            require('../components/header.php')
        ?>

        <main class="container">
            <div class="contenedor-volver">
                <button class="btn btn-violeta show"><span class="icon-volver"></span>Volver</button>
            </div>
            <h1>Suspender Consulta</h1>
            <section class="card">
                <?php
                    //Acá se obtiene la consulta que se haya seleccionado del listado
                    $consulta = array(
                        'materia' => "fisica",
                        'fecha' => '13 de abril',
                        'esVirtual' => 1
                    );
                    $esVirtual = $consulta["esVirtual"] ?  "Virtual" : "Presencial";
                    echo("<p>".$consulta["materia"].", ".$consulta["fecha"].", ".$esVirtual."</p>");
                ?>
                <form class="formulario" action="../../controllers/consultations/pre-suspend.php" method="post">
                    <h2>¿Desea reprogramar esta consulta para una fecha especial?</h2>
                    <div class="contenedor-botones">
                        <input type="submit" class="btn btn-rojo" name="boton" value="No" id="boton-no"></button>
                        <input type="submit" class="btn btn-verde" name="boton" value="Si" id="boton-si"></button>
                    </div>
                </form>
            </section>
        </main>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
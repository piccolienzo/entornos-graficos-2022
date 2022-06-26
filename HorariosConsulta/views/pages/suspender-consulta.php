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
            <!-- <div id="opciones">
                <h2>¿Desea reprogramar esta consulta para una fecha especial?</h2>

                <div class="contenedor-botones">
                    <button class="btn btn-rojo" id="opcion"> NO </button>
                    <button class="btn btn-verde" id="opcion"> SI </button>
                </div>
            </div> -->

            <!-- <div id="suspender">
                <form class="formulario" action="../../controllers/users/suspend.php" method="post">
                    <label class="subtitulo">Motivo de suspensión</label>
                    <br>
                    <select class="input" name="motivoSuspension">
                        <option value="Enfermedad">Enfermedad</option>
                        <option value="Accidente">Accidente</option>
                        <option value="Licencia">Licencia</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <br>
                    <label class="subtitulo">Comentarios</label>
                    <br>
                    <input type="text" class="input text-area" name="comentarioSuspension" width="auto"/>
                    <div class="contenedor-botones-derecha">
                        <button type="submit" class="btn btn-violeta"> Confirmar <span class="icon-entrar"></span> </button>
                    </div>
                </form>
            </div> -->
        </section>
    </main>

    <?php
        require('../components/footer.php')
    ?>
</body>
</html>
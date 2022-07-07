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
            <h1>Modificar Consulta</h1>
            <h2>Seleccione modalidad y lugar</h2>
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

                <div id="modificar">
                    <form class="formulario" action="reprogramar-consulta.php" method="post">
                        <label class="subtitulo">Modalidad</label>
                        <br>
                        <div class="contenedor-botones">
                            <button class="btn">Virtual</button>
                            <button class="btn">Presencial</button>
                        </div>
                        <br>
                        <label class="subtitulo">Lugar</label>
                        <br>
                        <input type="text" class="input text-area" name="lugar" width="auto"/>
                        <div class="contenedor-botones-derecha">
                            <button type="submit" class="btn btn-violeta"> Confirmar <span class="icon-entrar"></span> </button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
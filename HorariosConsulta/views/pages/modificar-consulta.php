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
            require('../components/header.php');
            extract($_POST);
        ?>

        <main class="container">
            <div class="contenedor-volver">
                <button class="btn btn-violeta show"><span class="icon-volver"></span>Volver</button>
            </div>
            <h1>Modificar Consulta</h1>
            <h2>Seleccione modalidad y lugar</h2>
            <section class="card">
                <div id="modificar">
                    <form class="formulario" action="../../controllers/consultations/create.php" method="post">
                    <?php
                        if(isset($idProfesorMateria)) {
                            echo("
                                    <input type='hidden' name='idProfesorMateria' value={$idProfesorMateria}/>
                                ");
                        }
                        if(isset($hora)) {
                            echo("
                                    <input type='hidden' name='hora' value={$hora}/>
                                ");
                        }
                        if(isset($dia)) {
                            echo("
                                    <input type='hidden' name='dia' value={$dia}/>
                                ");
                        }
                    ?>
                        <label class="subtitulo">Modalidad</label>
                        <br>
                        <div class="contenedor-botones">
                            <input type="radio" name="esVirtual" value="1" class="btn" required>Virtual</button>
                            <input type="radio" name="esVirtual" value="0" class="btn" required>Presencial</button>
                        </div>
                        <br>
                        <label class="subtitulo">Lugar</label>
                        <br>
                        <input type="text" class="input text-area" name="lugar" width="auto" required/>
                        <label class="subtitulo">Cupo</label>
                        <br>
                        <input type="number" required class="input text-area" name="cupo" width="auto" required/>
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
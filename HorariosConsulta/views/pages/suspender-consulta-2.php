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
                <form class="formulario" action="../../controllers/consultations/suspend.php" method="post">
                    <label class="subtitulo">Motivo de suspensión</label>
                    <br>
                    <select class="input" name="motivoSuspension" required>
                        <option value="Enfermedad">Enfermedad</option>
                        <option value="Accidente">Accidente</option>
                        <option value="Licencia">Licencia</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <br>
                    <label class="subtitulo">Comentarios</label>
                    <br>
                    <input type="text" class="input text-area" name="comentarioSuspension" required/>
                    <div class="contenedor-botones-derecha">
                        <button type="submit" class="btn btn-violeta"> Confirmar <span class="icon-entrar"></span> </button>
                    </div>
                </form>
            </section>
    </main>

    <?php
        require('../components/footer.php')
    ?>
</body>
</html>
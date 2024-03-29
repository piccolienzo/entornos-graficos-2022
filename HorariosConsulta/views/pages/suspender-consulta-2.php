<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../static/css/global.css" /> 
        <link rel="stylesheet" href="styles/header.css" /> 
        <link rel="stylesheet" href="styles/footer.css" /> 
        <link rel="stylesheet" href="../../static/css/suspender-consulta.css" /> 
        <title>Listado de consultas</title>
    </head>

    <body>

        <?php
            require('../components/header.php');
            include('../../controllers/getNextDay.inc.php');
            extract($_GET);
            $consultation = $_SESSION["resultado_consulta"][0];
        ?>

        <main class="container">
            <h1>Suspender Consulta</h1>
            <h2 class="contador-pasos">(Paso 2 de 2)</h2>
            <section class="card">
                <?php
                    $esVirtual = $consultation["esVirtual"] ?  "Virtual" : "Presencial";
                    echo("<p>".$consultation["matNombre"].", ".getNextDay($consultation['dia'])['label'].", ".$esVirtual."</p>");
                ?>
                <form class="formulario" action="../../controllers/consultations/modify.php" method="post">
                    <?php
                        if(isset($id)) {
                            echo("<input type='hidden' name='id' value='{$id}'/>");
                            $_SESSION["formulario_consulta"]["id"] = $id;
                        }
                    ?>
                    <label class="subtitulo">Motivo de suspensión *</label>
                    <br>
                    <select class="input-white input-bordered select" style='margin: 15px;' name="motivoSuspension" required>
                        <option value="Enfermedad">Enfermedad</option>
                        <option value="Accidente">Accidente</option>
                        <option value="Licencia">Licencia</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <br>
                    <label class="subtitulo">Comentarios *</label>
                    <br>
                    <input type="text" class="input text-area" name="comentarioSuspension" style='margin: 15px;' maxlength="100" required/>
                    <div class="contenedor-botones-derecha">
                        <button type="submit" class="btn btn-violeta"> Confirmar <span class="icon-entrar"></span></button>
                    </div>
                </form>
            </section>
    </main>

    <?php
        require('../components/footer.php')
    ?>
</body>
</html>
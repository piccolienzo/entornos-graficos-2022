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
            extract($_POST);
            $actionLabel = isset($id) ? "Modificar" : "Crear";
            $actionUrl = isset($id) ? '../../controllers/consultations/modify.php' : '../../controllers/consultations/create.php'
        ?>

        <main class="container">
            <h1><?php echo($actionLabel); ?> Consulta</h1>
            <h2 class="contador-pasos">(Paso 5 de 5)</h2>
            <h3>Seleccione modalidad y lugar</h3>
            <section class="card">
                <div id="modificar">
                    <form class="formulario" action="<?php echo($actionUrl); ?>" method="post">
                    <?php
                        if(isset($idProfesorMateria)) {
                            echo("<input type='hidden' name='idProfesorMateria' value='{$idProfesorMateria}'/>");
                            $_SESSION["formulario_consulta"]["idProfesorMateria"] = $idProfesorMateria;
                        }
                        else if(isset($_SESSION["formulario_consulta"]["idProfesorMateria"])) {
                            echo("<input type='hidden' name='idProfesorMateria' value='{$_SESSION["formulario_consulta"]["idProfesorMateria"]}'/>");
                        }

                        if(isset($hora)) {
                            echo("<input type='hidden' name='hora' value='{$hora}'/>");
                            $_SESSION["formulario_consulta"]["hora"] = $hora;
                        }
                        else if(isset($_SESSION["formulario_consulta"]["hora"])) {
                            echo("<input type='hidden' name='hora' value='{$_SESSION["formulario_consulta"]["hora"]}'/>");
                        }

                        if(isset($dia)) {
                            echo("<input type='hidden' name='dia' value='{$dia}'/>");
                            $_SESSION["formulario_consulta"]["dia"] = $dia;
                        }
                        else if(isset($_SESSION["formulario_consulta"]["dia"])) {
                            echo("<input type='hidden' name='dia' value='{$_SESSION["formulario_consulta"]["dia"]}'/>");
                        }

                        if(isset($id)) {
                            echo("<input type='hidden' name='id' value='{$id}'/>");
                            $_SESSION["formulario_consulta"]["id"] = $id;
                        }
                        else if(isset($_SESSION["formulario_consulta"]["id"])) {
                            echo("<input type='hidden' name='id' value='{$_SESSION["formulario_consulta"]["id"]}'/>");
                        }

                        if(isset($fechaEspecial)) {
                            echo("<input type='hidden' name='fechaEspecial' value='{$fechaEspecial}'/>");
                            $_SESSION["formulario_consulta"]["fechaEspecial"] = $fechaEspecial;
                        }
                    ?>
                        <h4 class="subtitulo">Modalidad *</h4>
                        <div class="contenedor-botones">
                            <label class='label-check'>    
                                <input type="radio" name="esVirtual" value="1" required>Virtual
                            </label>
                            <label class='label-check'>
                                <input type="radio" name="esVirtual" value="0" required>Presencial
                            </label>
                        </div>
                        <h4 class="subtitulo">Lugar o Link de consulta *</h4>
                        <input type="text" class="input text-area" name="lugar" width="auto" required/>
                        <br>
                        <h4 class="subtitulo">Cupo *</h4>
                        <input type="number" class="num-area" required name="cupo" width="auto" min="1"/>
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

        <?php
            if(isset($backurl)) {
                echo("
                    <script>
                        backurl = '".$backurl."';
                        document.querySelector('#volver').style.display = 'block';
                        document.querySelector('#volver').addEventListener('click', back);      
                    </script>
                ");
            }
        ?>
    </body>
</html>
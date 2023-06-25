<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/global.css" /> 
    <link rel="stylesheet" href="../../static/css/tipo-consulta.css" /> 
    <title>Reprogramar consulta</title>
</head>

<body>

    <?php
        require('../components/header.php');
        extract($_POST);
        extract($_GET);
        $actionLabel = isset($id) ? "Modificar" : "Crear";
    ?>

    <main class="container">
        <h1><?php echo($actionLabel); ?> Consulta</h1>
        <h2 class="contador-pasos">(Paso 3 de 5)</h2>
        <h3>Seleccione un día *</h3>
                
        <section class="card">
            <form class="formulario" action="reprogramar-consulta-2.php" method="post">
            <input type='hidden' id='thisurl' name='backurl'>
            <?php
                    if(isset($idProfesorMateria)) {
                        echo("<input type='hidden' name='idProfesorMateria' value='{$idProfesorMateria}'/>");
                        $_SESSION["formulario_consulta"]["idProfesorMateria"] = $idProfesorMateria;
                    }
                    else if(isset($_SESSION["formulario_consulta"]["idProfesorMateria"])) {
                        echo("<input type='hidden' name='idProfesorMateria' value='{$_SESSION["formulario_consulta"]["idProfesorMateria"]}'/>");
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

                    $fieldName = 'dia';
                    
                    echo("
                            <label class='label-check'>
                                <input type='radio' name='".$fieldName."' required value='LUNES'> Lunes
                            </label>
                            <label class='label-check'>
                                <input type='radio' name='".$fieldName."' required value='MARTES'> Martes
                            </label>
                            <label class='label-check'>
                                <input type='radio' name='".$fieldName."' required value='MIERCOLES'>Miércoles
                            </label>
                            <label class='label-check'>
                                <input type='radio' name='".$fieldName."' required value='JUEVES'> Jueves
                            </label>
                            <label class='label-check'>
                                <input type='radio' name='".$fieldName."' required value='VIERNES'> Viernes
                            </label>
                            <label class='label-check'>
                                <input type='radio' name='".$fieldName."' required value='SABADO'> Sábado
                            </label>
                    ");
                ?>
                
                <button type="submit" class="btn btn-violeta"> Continuar <span class="icon-entrar"></span> </button>
                
            </form>
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

    <script>
        (function() {
            document.querySelector("#thisurl").value = btoa(window.location.href);
        })();
    </script>
</body>
</html>
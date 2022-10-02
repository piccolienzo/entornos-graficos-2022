<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/global.css" /> 
    <link rel="stylesheet" href="../../static/css/suspender-consulta.css" /> 
    <title>Reprogramar consulta</title>
</head>

<body>

    <?php
        require('../components/header.php');
        extract($_POST);
        $actionLabel = isset($id) ? "Modificar" : "Crear";
    ?>

    <main class="container">

        <form class="formulario" action="reprogramar-consulta-2.php" method="post">  
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
            ?>  
            <h1><?php echo($actionLabel); ?> Consulta</h1>
            <h2>Seleccione día</h2>
            <div class="contenedores-botones">
                <input type="radio" name="dia" required class="btn" value="LUNES"> Lunes </button>
                <input type="radio" name="dia" required class="btn" value="MARTES"> Martes </button>
                <input type="radio" name="dia" required class="btn" value="MIERCOLES">Miércoles </button>
            </div>
            <div class="contenedores-botones">
                <input type="radio" name="dia" required class="btn" value="JUEVES"> Jueves </button>
                <input type="radio" name="dia" required class="btn" value="VIERNES"> Viernes </button>
                <input type="radio" name="dia" required class="btn" value="SABADO"> Sábado </button>
            </div>
            
            <div class="contenedor-botones-derecha">
                <button type="submit" class="btn btn-violeta"> Confirmar <span class="icon-entrar"></span> </button>
            </div>
        </form>
    </main>

    <?php
        require('../components/footer.php')
    ?>

<script>
    (function() {
        document.querySelector("#volver").style.display = "block";
        document.querySelector("#volver").addEventListener("click", back);
    })();

    function back(){
        window.location.href = "listado-materias.php";
    }

    (function() {
        document.querySelector("#volver").style.display = "block";
        document.querySelector("#volver").addEventListener("click", back);
    })();

    function back(){
        window.location.href = "listado-materias.php";
    }
</script>
</body>
</html>
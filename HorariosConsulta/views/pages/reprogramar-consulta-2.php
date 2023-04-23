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
        <form class="formulario" id="formulario" action="modificar-consulta.php" method="POST">
            <input type='hidden' id='thisurl' name='backurl'>
            <?php

                if(isset($fechaEspecial)) {
                    echo("<input type='hidden' name='fechaEspecial' value='{$fechaEspecial}'/>");
                    $_SESSION["formulario_consulta"]["fechaEspecial"] = $fechaEspecial;
                }

                if(isset($idProfesorMateria)) {
                    echo("<input type='hidden' name='idProfesorMateria' value='{$idProfesorMateria}'/>");
                    $_SESSION["formulario_consulta"]["idProfesorMateria"] = $idProfesorMateria;

                }
                else if(isset($_SESSION["formulario_consulta"]["idProfesorMateria"])) {
                    echo("<input type='hidden' name='idProfesorMateria' value='{$_SESSION["formulario_consulta"]["idProfesorMateria"]}'/>");
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
                else if(isset($_SESSION["formulario_consulta"]["dia"])) {
                    echo("<input type='hidden' name='id' value='{$_SESSION["formulario_consulta"]["dia"]}'/>");
                }

            ?>              
            <h1><?php echo($actionLabel); ?> Consulta</h1>
            <h2 class="contador-pasos">(Paso 4 de 5)</h2>
            <h3>Seleccione turno y horario *</h3>
                <div class="contenedor-botones">
                    <input type="radio" name="turno" class="btn" onclick="seleccionarOpcion('manana')" checked> Mañana </button>
                    <input type="radio" name="turno" class="btn" onclick="seleccionarOpcion('tarde')"> Tarde </button>
                    <input type="radio" name="turno" class="btn" onclick="seleccionarOpcion('noche')"> Noche </button>
                </div>

                <div class="contenedor-botones-vertical" id="manana">
                    <div>    
                        <input type="radio" name="hora" required class="btn ancho" value="07:15-08:00"> 7:15 - 8:00 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="08:00-08:45"> 8:00 - 8:45 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="08:45-09:30"> 8:45 - 9:30 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="10:15-11:00"> 10:15 - 11:00 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="11:00-11:45"> 11:00 - 11:45 </button>
                    </div>
                </div>

                <div class="contenedor-botones-vertical" id="tarde">
                    <div>    
                        <input type="radio" name="hora" required class="btn ancho" value="13:00-13:45"> 13:00 - 13:45 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="13:45-14:30"> 13:45 - 14:30 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="14:30-15:15"> 14:30 - 15:15 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="15:15-16:00"> 15:15 - 16:00 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="16:00-16:45"> 16:00 - 16:45 </button>
                    </div>
                </div>

                <div class="contenedor-botones-vertical" id="noche">
                    <div>    
                        <input type="radio" name="hora" required class="btn ancho" value="17:00-17:45"> 17:00 - 17:45 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="17:45-18:30"> 17:45 - 18:30 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="18:30-19:15"> 18:30 - 19:15 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="20:00-20:45"> 20:00 - 20:45 </button>
                    </div>
                    <div>
                        <input type="radio" name="hora" required class="btn ancho" value="20:45-21:30"> 20:45 - 21:30 </button>
                    </div>
                </div>
            </div>

            <div class="contenedor-botones-derecha">
                <button type="submit" class="btn btn-violeta"> Confirmar <span class="icon-entrar"></span> </button>
            </div>
        </form>
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
        
        document.getElementById("manana").style.display = "inline";
        document.getElementById("tarde").style.display = "none";
        document.getElementById("noche").style.display = "none";

        function seleccionarOpcion(opcion){
            var ele = document.getElementsByName('hora');
              
            for(i = 0; i < ele.length; i++) {
                ele[i].checked = false;
            }

            if(opcion == 'manana') {
                document.getElementById("manana").style.display = "inline";
                document.getElementById("tarde").style.display = "none";
                document.getElementById("noche").style.display = "none";
            }
            else if(opcion == 'tarde') {
                document.getElementById("manana").style.display = "none";
                document.getElementById("tarde").style.display = "inline";
                document.getElementById("noche").style.display = "none";
            }
            else if(opcion == 'noche') {
                document.getElementById("manana").style.display = "none";
                document.getElementById("tarde").style.display = "none";
                document.getElementById("noche").style.display = "inline";
            }
        }

    </script>

    <script>
        (function() {
            document.querySelector("#thisurl").value = btoa(window.location.href);
        })();
    </script>
</body>
</html>
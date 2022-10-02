<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" />
        <link rel="stylesheet" href="styles/login.css" /> 
        <title>Detalle de consulta</title>
    </head>

    <?php
        $errorText;
        
        if( isset($_GET['success']) ) {
            $errorText = "Modificado exitosamente";
        }

        if( isset($errorText) ) {
            echo("
                    <script type='text/javascript'>
                        window.onload = function() {
                            alert('".$errorText."')
                        };
                    </script>
            ");
        }
    ?>

    <body>

        <?php
            require('../components/header.php')
        ?>

        <main class="container">

            <button>Imprimir</button>
            <h1>Detalle Consultas</h1>
            
            <?php
                if(isset($_SESSION["resultado_consulta"])){
                    $result = $_SESSION["resultado_consulta"];
                    if(count($result)) {                        
                        foreach($result as $x => $a){
                            $cancelAction = $a['cancelado'] ? 'Habilitar' : 'Suspender';
                            $modalidad = $a["esVirtual"] ? "Virtual" : "Presencial";
                            echo("
                                <p>Día: ".$a["dia"]."</p>
                                <p>Hora: ".substr($a["horaInicio"], 0, -3)." - ".substr($a["horaFin"], 0, -3)."</p>
                                <p>Materia: ".$a["matNombre"]."</p>
                                <p>Modalidad: ".$modalidad."</p>
                                <p>Lugar: ".$a["lugar"]."</p>
                                <p>Profesor: ".$a["profNombre"]."</p>
                                
                                <button onclick='suspender({$a['id']},{$a['cancelado']})'>{$cancelAction}</button>
                                <button onclick='modificar({$a['id']})'>Modificar</button>
                            ");
                        }
                    }
                    else {
                        echo( "<p>Hubo un error al obtener el detalle de la consulta</p>");
                    }
                }
            ?>

        </main>

        <script>
            function suspender(id, cancelado) {
                window.location.href = "../../controllers/consultations/suspend.php?id=" + id + "&cancelado=" + cancelado;
            }

            function modificar(id) {
                window.location.href = "../../controllers/teachers/teachers.php?nextPage=listado-profesores.php?id=".id;
            }
        </script>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
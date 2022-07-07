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
        require('../components/header.php')
    ?>

    <main class="container">
        <div class="contenedor-volver">
            <button class="btn btn-violeta show"><span class="icon-volver"></span>Volver</button>
        </div>
        <form class="formulario" action="reprogramar-consulta-2.php" method="post">    
            <h2>Seleccione día</h2>
            <div class="contenedores-botones">
                <button class="btn" onclick="seleccionarOpcion('LUNES')"> Lunes </button>
                <button class="btn" onclick="seleccionarOpcion('MARTES')"> Martes </button>
                <button class="btn" onclick="seleccionarOpcion('MIERCOLES')">Miércoles </button>
            </div>
            <div class="contenedores-botones">
                <button class="btn" onclick="seleccionarOpcion('JUEVES')"> Jueves </button>
                <button class="btn" onclick="seleccionarOpcion('VIERNES')"> Viernes </button>
                <button class="btn" onclick="seleccionarOpcion('SABADO')"> Sábado </button>
            </div>
            
            <div class="contenedor-botones-derecha">
                <button type="submit" class="btn btn-violeta" onclick="confirmarHorario()"> Confirmar <span class="icon-entrar"></span> </button>
            </div>
        </form>
    </main>

    <?php
        require('../components/footer.php')
    ?>

    <script>
        document.getElementById("tarde").style.display = "none";
        document.getElementById("noche").style.display = "none";
    </script>
</body>
</html>
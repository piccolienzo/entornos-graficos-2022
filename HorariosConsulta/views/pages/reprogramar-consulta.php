<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/global.css" /> 
    <link rel="stylesheet" href="../../static/css/suspender-consulta.css" /> 
    <title>Reprograma consultas</title>

    <script>
        function seleccionarOpcion(opcion){
            if(opcion == 'manana') {
                document.getElementById("manana").style.visibility = "inline";
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

        function seleccionarHorario(horaDesde, horaHasta){
            console.log(horaDesde);
            console.log(horaHasta);
        }

        function confirmarHorario(){
            
        }
    </script>
</head>

<body>

    <?php
        require('../components/header.php')
    ?>

    <main class="container">
        <div class="contenedor-volver">
            <button class="btn btn-violeta show"><span class="icon-volver"></span>Volver</button>
        </div>
        <div id="reprogramar">
            
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
            
            <h2>Seleccione turno y horario</h2>
                <div class="contenedor-botones">
                    <button class="btn" onclick="seleccionarOpcion('manana')"> Mañana </button>
                    <button class="btn" onclick="seleccionarOpcion('tarde')"> Tarde </button>
                    <button class="btn" onclick="seleccionarOpcion('noche')"> Noche </button>
                </div>

                <div class="contenedor-botones-vertical" id="manana">
                    <div>    
                        <button class="btn ancho" onclick="seleccionarHorario('7:15', '8:00')"> 7:15 - 8:00 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('8:00', '8:45')"> 8:00 - 8:45 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('8:45', '9:30')"> 8:45 - 9:30 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('10:15', '11:00')"> 10:15 - 11:00 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('11:00', '11:45')"> 11:00 - 11:45 </button>
                    </div>
                </div>

                <div class="contenedor-botones-vertical" id="tarde">
                    <div>    
                        <button class="btn ancho" onclick="seleccionarHorario('13:00', '13:45')"> 13:00 - 13:45 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('13:45', '14:30')"> 13:45 - 14:30 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('14:30', '15:15')"> 14:30 - 15:15 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('15:15', '16:00')"> 15:15 - 16:00 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('16:00', '16:45')"> 16:00 - 16:45 </button>
                    </div>
                </div>

                <div class="contenedor-botones-vertical" id="noche">
                    <div>    
                        <button class="btn ancho" onclick="seleccionarHorario('17:00', '17:45')"> 17:00 - 17:45 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('17:45', '18:30')"> 17:45 - 18:30 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('18:30', '19:15')"> 18:30 - 19:15 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('20:00', '20:45')"> 20:00 - 20:45 </button>
                    </div>
                    <div>
                        <button class="btn ancho" onclick="seleccionarHorario('20:45', '21:30')"> 20:45 - 21:30 </button>
                    </div>
                </div>
            </div>

            <div class="contenedor-botones-derecha">
                <button type="submit" class="btn btn-violeta" onclick="confirmarHorario()"> Confirmar <span class="icon-entrar"></span> </button>
            </div>
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
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" /> 
        <link rel="stylesheet" href="styles/header.css" /> 
        <link rel="stylesheet" href="styles/footer.css" /> 
        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
        <title>Resultado</title>
    </head>

    <body>

        <?php
            require('../components/header.php')
        ?>

<main class="container">
 
        <?php
            extract($_GET);
            if($success == 1){
            ?>  
                <h1>Consulta Agendada</h1>
                 <section class="card ticket">
                    <span class="check-icon"></span>
                    
                    <h2>Consulta registrada correctamente</h2>
                    <div id="datosConsulta" class="datosConsulta">

                        <style>
                            .ticket{
                                display: flex;
                                flex-direction: column;
                                align-items:center;
                                text-align:center;
                                padding: 0 5% 5% 5%;
                            }
                            .btn-print{
                                align-self:flex-end;
                                margin: 20px 20px 0 0;
                            }
                            .datosConsulta{
                                text-align:left;
                            }
                            @media (max-width: 720px) {
                                .ticket{
                                display: flex;
                                flex-direction: column;
                                align-items:center;
                                text-align:center;
                                padding: 0 0 5% 0;
                                }
                            }
                        </style>
                    </div>
                     
                 </section>
            <?php                 
            }             
            else{
            ?> 
                <h1>Error</h1>
                 <section class="card ticket">
                    <h2>La operacion no se pudo completar</h2>
                    <span class="cross-icon"></span>
                 </section>
            <?php
            }
            ?> 
 
        </main>
        <?php
            require('../components/footer.php')
        ?>
    </body>

    <script>
        $(
            function() {
                const params = new Proxy(new URLSearchParams(window.location.search), {
                    get: (searchParams, prop) => searchParams.get(prop),
                    });
                    let resultado = JSON.parse(atob(params.result));
                    console.log(resultado)
                    $("#fecha")[0].innerText = resultado["fechaHora"];
                    $("#idtransac")[0].innerText = "#"+resultado["id"];
                    $("#hora")[0].innerText = resultado["horaInicio"]+" a " + resultado["horaFin"];
                    $("#profesor")[0].innerText =resultado["nombre"] + " " + resultado["apellido"];
                    $("#materia")[0].innerText =resultado["nombreMateria"];
                    $("#modalidad")[0].innerText =resultado["esVirtual"] == 1?"Virtual":"Presencial";
                    $("#lugar")[0].innerText =resultado["lugar"];

            }
        )

            $("#btnPrint").on("click", function () {
            let divContents = $("#datosConsulta").html();
            let printWindow = window.open('', '_blank', 'fullscreen="yes"');
            printWindow.document.write('<html><head><title>Comprobante</title>');
            printWindow.document.write('</head><body > <h1>Comprobante de inscripcion a consulta</h1>');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
        
    </script>
     
</html>
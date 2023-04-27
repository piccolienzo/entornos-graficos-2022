<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" /> 
        <link rel="stylesheet" href="styles/login.css" /> 
        <title>Contacto</title>
        <?php   
            $alertText;
            if( isset($_GET['error']) ) {
                $errorType = $_GET['error'];
                
                if( $errorType == 'invalidEmail') $alertText = "Formato de correo electrónico inválido";
                else if( $errorType == 'emptyFields') $alertText = "Complete todos los campos";
            }
            else {
                if( isset($_GET['success']) ) {
                    $alertText = "Consulta enviada con éxito";
                }
            }
            if( isset($alertText) ) {
                echo("
                    <script type='text/javascript'>
                        window.onload = function() {
                            alert('".$alertText."')
                        };
                    </script>
                ");
            }
        ?>
    </head>

    <body>

        <?php
            require('../components/header.php')
        ?>

        <main class="container">

            <h1>Contacto</h1>
            <form class="formulario" action="../../controllers/contact/contact.php" method="post">
                <label for="correo"> Correo electrónico *</label>
                <input type="email" class="input-white" id="correo" name="correo" required/>
                <label for="asunto">Asunto *</label>
                <input type="text" class="input-white" id="asunto" name="asunto" required/>
                <label for="mensaje">Mensaje *</label>
                <input type="text" class="input-white" id="mensaje" name="mensaje" required/>
                <button type="submit" class="btn btn-violeta"> Enviar <span class="icon-entrar"></span> </button>
            </form>

        </main>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
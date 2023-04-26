<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" /> 
        <link rel="stylesheet" href="styles/login.css" /> 
        <title>Inicio de Sesión</title>
        <?php   
            if( isset($_GET['error']) ) {
                $errorType = $_GET['error'];
                $errorText;
                
                if( $errorType == 'noUserFound') $errorText = "El legajo ingresado no corresponde con ningún usuario";
                else if( $errorType == 'wrongPassword') $errorText = "Contraseña incorrecta";
                else if( $errorType == 'disabled') $errorText = "Usuario deshabilitado";

                echo("
                        <script type='text/javascript'>
                            window.onload = function() {
                                alert('".$errorText."')
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

        <?php
            if(isset($_SESSION["usuario"])){
                header("Location: ../../index.php");
            }
        ?>


        <main class="container">

            <section class="login">
            <h1>Ingreso</h1>
            <form class="formulario" action="../../controllers/users/login.php" method="post">
                <label for="legajo"> Legajo *</label>
                <input required type="text" class="input-white" id="legajo" name="legajo" />
                <label for="password">Contraseña *</label>
                <input required type="password" class="input-white" id="password" name="password" />
                <button type="submit" class="btn btn-violeta"> Entrar <span class="icon-entrar"></span> </button>
            </form>
            

            <p>¿Olvidaste tu contraseña? <a href="recuperar-clave.php" rel="noopener noreferrer">Click acá</a></p>
            </section>

        </main>

        <?php
            require('../components/footer.php');
        ?>
    </body>
</html>
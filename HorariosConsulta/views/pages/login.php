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
            <section class="error-message">
                <?php   
                    if( isset($_GET['error']) ) {
                        $errorType = $_GET['error'];
                        if( $errorType == 'noUserFound') {
                            echo( "<p class='error-message'> El legajo ingresado no corresponde con ningún usuario </p>");
                        }
                        if( $errorType == 'wrongPassword') {
                            echo( "<p class='error-message'> Contraseña incorrecta </p>");
                        }
                    }
                ?>
            </section>

            <section class="login">
            <h1>Ingreso</h1>
            <form class="formulario" action="../../controllers/users/login.php" method="post">
                <label for="legajo"> Legajo </label>
                <input type="text" class="input-white" id="legajo" name="legajo" />
                <label for="password">Contraseña</label>
                <input type="password" class="input-white" id="password" name="password" />
                <button type="submit" class="btn btn-violeta"> Entrar <span class="icon-entrar"></span> </button>
            </form>
            

            <p>¿Olvidaste tu contraseña?<a href="forgot-password.php" target="_blank" rel="noopener noreferrer">Click acá</a></p>
            </section>

        </main>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
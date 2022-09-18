<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" /> 
        <link rel="stylesheet" href="styles/login.css" /> 
        <title>Recuperar contraseña</title>
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
                <h1>Recuperar contraseña</h1>
                <h2>Ingrese su correo electrónico</h2>
                <form class="formulario" action="../../controllers/users/change-password.php" method="post">
                    <label for="legajo">Legajo</label>
                    <input type="text" class="input-white" id="legajo" name="legajo" required />
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="input-white" id="email" name="email" required />
                    <button type="submit" class="btn btn-violeta"> Recuperar <span class="icon-entrar"></span> </button>
                </form>
            </section>

        </main>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font/fonts.css" /> 
        <link rel="stylesheet" href="styles/global.css" /> 
        <link rel="stylesheet" href="styles/login.css" /> 
        <title>Usuario</title>
    </head>

    <?php
        if(isset($_SESSION["edicion"])){
            $edit = true;
        }
        else {
            $edit = false;
        }
    ?>

    <body>

        <?php
            require('../components/header.php')
        ?>

        <main class="container">
            <section class="login">
                <h1>Usuario</h1>
                <form class="formulario" action="../../controllers/users/create.php" method="post">
                    <label for="nombre"> Nombre </label>
                    <input type="text" class="input-white" id="nombre" name="nombre" required/>
                    <label for="apellido"> Apellido </label>
                    <input type="text" class="input-white" id="apellido" name="apellido" required/>
                    <label for="dni"> DNI </label>
                    <input type="number" class="input-white" id="dni" name="dni" required/>
                    <label for="usuario"> Usuario </label>
                    <input type="text" class="input-white" id="usuario" name="usuario" required/>
                    <label for="email"> Email </label>
                    <input type="email" class="input-white" id="email" name="email" required/>
                    <label for="legajo"> Legajo </label>
                    <input type="text" class="input-white" id="legajo" name="legajo" required/>
                    <label for="rol"> Rol </label>
                    <select class="input-white" id="rol" name="rol" required>
                        <option value="alumnos">Alumno</option>
                        <option value="profesores">Profesor</option>
                        <option value="administradores">Administrador</option>
                    </select>
                    
                    <button type="submit" class="btn btn-violeta">
                        <?php
                            echo($edit ? 'Editar' : 'Crear')
                        ?>
                        <span class="icon-entrar"></span>
                    </button>
                </form>
            </section>

        </main>

        <?php
            require('../components/footer.php')
        ?>
    </body>
</html>
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
        extract($_GET);
        if(isset($edit)){

            include("../../controllers/connection.inc");
            $query = "select * from usuarios where id = ".$id;
            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            $usuario = mysqli_fetch_array($result);
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
                <form class="formulario" 
                    action="../../controllers/users/<?php
                            echo($edit ? ("edit.php?id=".$id) : "create.php");
                        ?>
                        "method="post">
                    <label for="nombre"> Nombre </label>
                    <input type="text" class="input-white" id="nombre" name="nombre" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["nombre"]);
                            }
                        ?>
                        required/>
                    <label for="apellido"> Apellido </label>
                    <input type="text" class="input-white" id="apellido" name="apellido" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["apellido"]);
                            }
                        ?>
                        required/>
                    <label for="dni"> DNI </label>
                    <input type="number" class="input-white" id="dni" name="dni" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["dni"]);
                            }
                        ?>
                        required/>
                    <label for="usuario"> Usuario </label>
                    <input type="text" class="input-white" id="usuario" name="usuario" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["usuario"]);
                            }
                        ?>
                        required/>
                    <label for="email"> Email </label>
                    <input type="email" class="input-white" id="email" name="email" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["email"]);
                            }
                        ?>
                        required/>
                    <label for="legajo"> Legajo </label>
                    <input type="text" class="input-white" id="legajo" name="legajo" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["legajo"]);
                            }
                        ?>
                        required/>
                    <?php
                        if(!$edit) {
                            echo("
                                <label for='rol'> Rol </label>
                                <select class='input-white' id='rol' name='rol' required>
                                    <option value='alumnos'>Alumno</option>
                                    <option value='profesores'>Profesor</option>
                                    <option value='administradores'>Administrador</option>
                                </select>
                            ");
                        }
                    ?>
                    
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
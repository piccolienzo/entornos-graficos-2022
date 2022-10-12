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
        <?php   
            if( isset($_GET['error']) ) {
                $errorType = $_GET['error'];
                $errorText;
                
                if( $errorType == 'repeatedData') $errorText = "Revise que los datos ingresados no correspondan con otro usuario";

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

    <?php
        extract($_GET);
        if(isset($edit)){
            if($edit) {
                include("../../controllers/connection.inc");
                $query = "select * from usuarios where id = ".$id;
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
                $usuario = mysqli_fetch_array($result);
            }
        }
    ?>

    <body>

        <?php
            require('../components/header.php');
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
                            else if( isset($_SESSION['formulario_usuario']) ) {
                                echo("value=".$_SESSION['formulario_usuario']['nombre']);
                            }
                        ?>
                        required/>
                    <label for="apellido"> Apellido </label>
                    <input type="text" class="input-white" id="apellido" name="apellido" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["apellido"]);
                            }
                            else if( isset($_SESSION['formulario_usuario']) ) {
                                echo("value=".$_SESSION['formulario_usuario']['apellido']);
                            }
                        ?>
                        required/>
                    <label for="dni"> DNI </label>
                    <input type="number" class="input-white" id="dni" name="dni" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["dni"]);
                            }
                            else if( isset($_SESSION['formulario_usuario']) ) {
                                echo("value=".$_SESSION['formulario_usuario']['dni']);
                            }
                        ?>
                        required/>
                    <label for="email"> Email </label>
                    <input type="email" class="input-white" id="email" name="email" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["email"]);
                            }
                            else if( isset($_SESSION['formulario_usuario']) ) {
                                echo("value=".$_SESSION['formulario_usuario']['email']);
                            }
                        ?>
                        required/>
                    <label for="legajo"> Legajo </label>
                    <input type="text" class="input-white" id="legajo" name="legajo" 
                        <?php
                            if(isset($usuario)) {
                                echo("value=".$usuario["legajo"]);
                            }
                            else if( isset($_SESSION['formulario_usuario']) ) {
                                echo("value=".$_SESSION['formulario_usuario']['legajo']);
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/tipo-consulta.css" /> 
    <title>Profesores</title>
</head>

<?php
    extract($_GET);

    include("../../controllers/connection.inc");

    $query = "select * from usuarios";
    if( isset($rol) && $rol != "" ) $query .= " inner join ".$rol." on usuarios.id = ".$rol.".idUsuario";
    if( isset($textSearch) ) $query .= " where legajo like '%".$textSearch."%' or nombre like '%".$textSearch."%' or apellido like '%".$textSearch."%'";
    
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $usuarios = array();
    while($row = mysqli_fetch_array($result)){
        array_push($usuarios, $row);
    }

    mysqli_close($link);
?>

<body>

<?php
    require('../components/header.php');
    extract($_GET);
    $actionLabel = isset($id) ? "Modificar" : "Crear";
?>

<main class="container">
    <h1><?php echo($actionLabel) ?> Consulta</h1>
    <section class="card">
        <?php
             if(isset($_SESSION["resultados_materias"])){
                $result = $_SESSION["resultados_materias"];
                if(count($result)) {
                        echo("
                            <h2>Seleccione Materia para el Profesor</h2>
                            <form action='reprogramar-consulta.php' method='POST'>
                                <input type='hidden' id='thisurl' name='backurl'>
                        ");
                        if(isset($id)) {
                            echo("
                                <input type='hidden' name='id' value='{$id}'/>
                            ");
                        }
                        foreach($result as $x => $a){ 
                            echo "
                                <label> {$a["nombre"]}
                                    <input type='radio' name='idProfesorMateria' value='{$a["id"]}' required>
                                </label>
                            ";
                        }

                        echo('
                                <button type="submit"> Continuar </button>
                            </form>
                        ');

                    }
                    else {
                        echo("
                            <p>No se encontraron resultados</p>
                        ");
                    }
            }
            else {
                header("Location: ../../controllers/subjects/byTeacher.php?nextPage=listado-materias.php");
            }
        ?>       
    </section>
</main>

<?php
    require('../components/footer.php')
?>

<script>
    (function() {
        document.querySelector("#thisurl").value = btoa(window.location.href);
    })();
</script>

</body>
</html>
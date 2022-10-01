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
    if(!isset($actionLabel)) {
        $actionLabel = "Crear";
    }
?>

<main class="container">
    <h1><?php echo($actionLabel) ?> Consulta</h1>
    <section class="card">
        <?php
             if(isset($_SESSION["resultados_materias"])){
                $result = $_SESSION["resultados_materias"];
                if(count($result)) {
                        echo("
                            <form action='reprogramar-consulta.php' method='POST'>
                        ");
                        foreach($result as $x => $a){ 
                            echo "
                                <label> {$a["nombre"]}
                                    <input type='radio' name='idProfesorMateria' value='{$a["id"]}'>
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
        document.querySelector("#volver").style.display = "block";
        document.querySelector("#volver").addEventListener("click", back);
    })();

    function back(){
        window.location.href = "listado-profesores.php";
    }
</script>
</body>
</html>
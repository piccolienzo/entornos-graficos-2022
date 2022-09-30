<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/listado-consultas.css" /> 
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
             if(isset($_SESSION["resultados_profesores"])){
                $result = $_SESSION["resultados_profesores"];
                if(count($result)) {   
                        echo ("
                            <form class='formulario' action='../../controllers/subjects/byTeacher.php' method='GET'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Listado de profesores</th>
                                            <th>Seleccione uno para continuar</th>
                                        </tr>
                                    </thead>
                        ");
                    
                        foreach($result as $x => $a){ 
                            echo "
                                <tbody class='tb'>
                                    <tr>
                                        <td>{$a["nombre"]} {$a["apellido"]}</td>
                                        <td>{$a["usuario"]}</td>
                                        <td>
                                            <input type='checkbox' name='id' value='{$a["id"]}' required>
                                        </td>
                                    </tr> 
                                </tbody>
                            ";
                        }

                        echo("
                                </table>
                                <button type='submit'>Continuar</button>
                                <input type='checkbox' name='nextPage' value='listado-materias.php' checked style='display: none'>
                            </form>
                        ");

                    }
                    else {
                        echo("
                            <p>No se encontraron resultados</p>
                        ");
                    }
            }
            else {
                header("Location: ../../controllers/teachers/teachers.php?nextPage=listado-profesores.php");
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
        window.location.href = "listado-consultas-admin.php";
    }
    
    function back(){
        window.location.href = "listado-materias.php";
    }
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/header.css" /> 
    <link rel="stylesheet" href="styles/footer.css" /> 
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
    $actionLabel = isset($id) ? "Modificar" : "Crear";
?>

<main class="container">
    <h1><?php echo($actionLabel) ?> Consulta</h1>
    <h2 class="contador-pasos">(Paso 1 de 5)</h2>
    <section class="card">
        <form class='filters' action='../../controllers/teachers/teachers.php' method='GET'>
            <input type='hidden' name='nextPage' value='listado-profesores.php'/>
            <input type='hidden' id='backurl' name='backurl'>
            <input type='text' name='textSearch' placeholder='Buscar por nombre del profesor'/>
            <?php
                if(isset($id)) {
                    echo("
                        <input type='hidden' name='id' value='{$id}'/>
                    ");
                }
            ?>
            <button type='submit' class='btn btn-violeta'>Buscar</button>
        </form>
        <?php
             if(isset($_SESSION["resultados_profesores"])){
                $result = $_SESSION["resultados_profesores"];
                if(count($result)) {   
                    echo("
                        <form class='formulario' action='../../controllers/subjects/byTeacher.php' method='GET'>
                            <input type='hidden' id='thisurl' name='backurl'>
                    ");
                    if(isset($id)) {
                        echo("
                            <input type='hidden' name='id' value='{$id}'/>
                        ");
                    }
                        echo ("
                            
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
                                            <input type='radio' name='teacherId' value='{$a["id"]}' required>
                                        </td>
                                    </tr> 
                                </tbody>
                            ";
                        }

                        echo("
                                </table>
                                <div class='contenedor-imprimir' style='margin-bottom: 20px'>
                                    <button class='btn btn-violeta' type='submit'>Continuar</button>
                                </div>
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
        document.querySelector("#backurl").value = backurl;
        if(document.querySelector("#thisurl")) {
            document.querySelector("#thisurl").value = btoa(window.location.href);
        }
    })();
</script>
</body>
</html>
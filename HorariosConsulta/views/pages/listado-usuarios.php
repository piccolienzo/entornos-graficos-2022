<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/listado-consultas.css" /> 
    <title>Usuarios</title>
    <?php   
            $alertText;
            if( isset($_GET['success']) ) {
                $successType = $_GET['success'];
                if($successType == 'edit')  $alertText = "Usuario editado con éxito";
                if($successType == 'disabled')  $alertText = "Usuario deshabilitado con éxito";
                if($successType == 'enabled')  $alertText = "Usuario habilitado con éxito";
                if($successType == 'new')  $alertText = "Usuario creado con éxito";
            }
            if( isset($alertText) ) {
                echo("
                    <script type='text/javascript'>
                        window.onload = function() {
                            alert('".$alertText."')
                        };
                    </script>
                ");
            }
        ?>
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
?>

<main class="container">
    <h1>Listado de Usuarios</h1>
    <section class="card">
        <button>
            <a href="usuario.php?edit=0">Agregar usuario</a>
        </button>
        <form class="formulario" action="./listado-usuarios.php" method="get">
            <label for="rol">Filtrar por rol</label>
            <select name="rol" id="rol">
                <option value="">Todos</option>
                <option value="alumnos" <?php if(isset($rol) && $rol == "alumnos")echo("selected"); ?> >Alumno</option>
                <option value="profesores" <?php if(isset($rol) && $rol == "profesores")echo("selected"); ?> >Profesor</option>
                <option value="administradores" <?php if(isset($rol) && $rol == "administradores")echo("selected"); ?> >Administrador</option>
            </select>
            <label for="textSearch">Buscar por legajo, nombre o apellido</label>
            <input type="text" id="busqueda" name="textSearch" class="input-white input-bordered" value="<?php if(isset($textSearch))echo($textSearch); ?>">
            <button type="submit">Buscar</button>
        </form>
        <?php
            if(count($usuarios)) {
                echo('
                    <table>
                        <thead>
                            <tr>
                                <th>Legajo</th>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>        
                ');
                foreach($result as $x => $user){
                    $enabledLabel = $user['habilitado'] ? 'Deshabilitar' : 'Habilitar';
                    echo ("
                        <tbody class='tb'>
                            <tr>
                                <td>{$user["legajo"]}</td>
                                <td>{$user["apellido"]}</td>
                                <td>{$user["nombre"]}</td>
                                <td>{$user["email"]}</td>
                                <td>
                                    <a href='usuario.php?edit=1&id=".$user["id"]."'>Editar</a>
                                    <a href='../../controllers/users/disable.php?id=".$user["id"]."&habilitado=".$user["habilitado"]."'>".$enabledLabel.".</a>
                                </td>
                            </tr> 
                        <tbody>
                    ");
                }
                echo("</table>");
            }
            else {
                echo("<h2>No se encontraron resultados</h2>");
            }
        ?>
        

    </section>
</main>
<?php
    require('../components/footer.php')
?>

<script>
    let backurl = "";
    (function() {
        document.querySelector("#volver").style.display = "block";
        document.querySelector("#volver").addEventListener("click", back);      
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        backurl = urlParams.get('backurl');
    })();

    function back(){
        window.location.href = atob(backurl);
    }
</script>
</body>
</html>
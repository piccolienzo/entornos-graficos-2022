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
</head>

<?php
    extract($_GET);

    include("../../controllers/connection.inc");

    $query = "select * from usuarios";
    if( isset($rol) ) $query .= " inner join ".$rol." on usuarios.id = ".$rol.".idUsuario";
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
    <?php
        foreach($result as $x => $user){ 
            echo ("
                <tbody class='tb'>
                    <tr>
                        <td>{$user["legajo"]}</td>
                        <td>{$user["apellido"]}</td>
                        <td>{$user["nombre"]}</td>
                        <td>{$user["email"]}</td>
                        <td>
                            <a href='usuario.php?edit=true&id=".$user["id"]."'>Editar</a>
                            <a href='../../controllers/users/disable.php?id=".$user["id"]."&habilitado=".$user["habilitado"]."'>Deshabilitar</a>
                        </td>
                    </tr> 
                <tbody>
            ");
        }
    ?>
</table>

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
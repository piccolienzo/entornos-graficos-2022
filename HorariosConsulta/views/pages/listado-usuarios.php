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

    $_SESSION['formulario_usuario'] = null;
?>

<body>

<?php
    require('../components/header.php');
?>

<main class="container">
    <h1>Listado de Usuarios</h1>
    <section class="card">
        <form class="formulario" action="./listado-usuarios.php" method="get">
            <div class="filters">
                <button type="button" id="btnPrint" class="btn-print" title="Imprimir comprobante" onclick="imprimir()">
                    <span class="print"></span>
                </button>
                <button type="button" class="btn btn-violeta btn-largo-medio" style="text-align: center" onclick="agregarUsuario()">
                    Nuevo usuario
                </button>
                <!-- <label for="textSearch">Buscar por legajo, nombre o apellido</label> -->
                <input type="text" id="busqueda" name="textSearch" placeholder="Buscar por legajo, nombre o apellido" class="input-white input-bordered" style="margin-left: 10px" value="<?php if(isset($textSearch))echo($textSearch); ?>">
                <button type="submit" class="btn btn-violeta" style="text-align: center">Buscar</button>
            </div>
            <div class="filters">
                <label for="rol">Filtrar por rol</label>
                <select name="rol" id="rol" class="input-white input-bordered select">
                    <option value="">Todos</option>
                    <option value="alumnos" <?php if(isset($rol) && $rol == "alumnos")echo("selected"); ?> >Alumno</option>
                    <option value="profesores" <?php if(isset($rol) && $rol == "profesores")echo("selected"); ?> >Profesor</option>
                    <option value="administradores" <?php if(isset($rol) && $rol == "administradores")echo("selected"); ?> >Administrador</option>
                </select>
            </div>
        </form>
        <?php
            if(count($usuarios)) {
                echo('
                    <table id="datosAImprimir">
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
                                    <button class='btn-listado' onclick='editarUsuario(".$user["id"].")'>Editar</button>
                                    <button class='btn-listado'onclick='habilitarUsuario(".$user["id"].",".$user["habilitado"].")'>".$enabledLabel."</button>
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
    require('../components/footer.php');
?>

<script>
    function imprimir() {
        let divContents = document.getElementById("datosAImprimir").innerHTML;
        let printWindow = window.open('', '_blank', 'fullscreen="yes"');
        printWindow.document.write('<html><head><title>Usuarios</title>');
        printWindow.document.write('</head><body > <h1>Listado de usuarios</h1>');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    };

    function agregarUsuario(){
        window.location.href = "usuario.php?edit=0" + "&backurl=" + btoa(window.location.href);
    }
    
    function editarUsuario(id){
        window.location.href = "usuario.php?edit=1&id=" + id + "&backurl=" + btoa(window.location.href);
    }
    
    function habilitarUsuario(id, habilitado){
        window.location.href = "../../controllers/users/disable.php?id=" + id + "&habilitado=" + habilitado + "&backurl=" + btoa(window.location.href);
    }
</script>
</body>
</html>
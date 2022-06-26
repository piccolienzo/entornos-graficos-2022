<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/global.css" /> 
    <title>Listado de consultas</title>
</head>

<body>

<?php
    require('../components/header.php')
?>

<main class="container">
    <h1>Listado de Consultas</h1>
<section class="card">

<table>
    <thead>
        <tr>
            <th>Profesor</th>
            <th>Materia</th>
            <th>&nbsp</th>
        </tr>
    </thead>
    <tbody>
    <?php
        if(isset($_SESSION["resultados_consulta"])){
            $result = $_SESSION["resultados_consulta"];
            foreach($result as $x => $a){ 
                echo "
                    <tr>
                        <td>{$a["profNombre"]}</td>
                        <td>{$a["matNombre"]}</td>
                        <td>algo</td>
                    </tr>
                    ";
            }
        }
    ?>
    </tbody>
</table>

</section>
</main>
<?php
    require('../components/footer.php')
?>
</body>
</html>
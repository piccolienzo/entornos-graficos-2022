<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio de Consultas UTN</title>
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/header.css" /> 
    <link rel="stylesheet" href="styles/footer.css" /> 
    <link rel="stylesheet" href="font/fonts.css" /> 
</head>
<?php
    if( isset($_GET['success']) ) {
            $successText = "Petición realizada con éxito";
            echo("
                <script type='text/javascript'>
                    window.onload = function() {
                        alert('".$successText."')
                    };
                </script>
            ");
    }
?>
<body>
<?php
    require('views/components/header.php');
?>
<main class="container">

<section class="card2">
    <?php
        $links = [];
        array_push(
            $links,
            array("text" => "Mapa del sitio", "href" => "./views/pages/mapa-sitio.php")
        );

        echo '
            <h1 class="title">
                Bienvenido al sitio web de consultas de la UTN
            </h1>
            <h2 class="title">
                Facultad Regional Rosario
            </h2>';

        if(!isset($_SESSION["usuario"])) {
            array_push(
                $links,
                array("text" => "Iniciar sesión", "href" => "./views/pages/login.php")
            );
        }

        echo '
            <img src="./static/images/UTN-Rosario.jpg" alt="Imagen ilustrativa de la universidad" class="img-index">
            
            <h3>Secciones del sitio web</h3>
            <ul>';

        foreach($links as $item) {
            echo('<li><a href="'.$item["href"].'">'.$item["text"].'</a></li>');
        }
        echo '</ul>';
    ?>
</section>

</main>
<?php
    require('views/components/footer.php')
?>
</body>
</html>
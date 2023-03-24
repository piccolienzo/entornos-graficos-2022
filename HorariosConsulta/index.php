<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio de Consultas UTN</title>
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="font/fonts.css" /> 
</head>
<?php
    require('views/components/header.php');
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

<main class="container">

<section>
    <?php
        $links = [];
        array_push(
            $links,
            array("text" => "Mapa del sitio", "href" => "./views/pages/mapa-sitio.php")
        );

        if(isset($_SESSION["usuario"])) {  
            echo '<h1>Bienvenido</h1>';  
        }
        else {
            echo '
                <h1 class="title">
                    Bienvenido al sitio web de consultas de la UTN
                </h1>
                <h2 class="title">
                    Facultad Regional Rosario
                </h2>';

            array_push(
                $links,
                array("text" => "Ingrese con su cuenta", "href" => "./views/pages/login.php")
            );
        }

        echo '
            <img src="./static/images/UTN-Rosario.jpg" alt="Imagen ilustrativa de la universidad" class="img-index">
            <ul>';

        foreach($links as $item) {
            echo('<li><a href="'.$item["href"].'">'.$item["text"].'</a></li>');
        }
        echo '</ul>';
    ?>
</section>

</main>
</body>
<?php
    require('views/components/footer.php')
?>
</html>
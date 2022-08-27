<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTN - Consultas</title>
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="font/fonts.css" /> 
</head>
<?php
    require('views/components/header.php')
?>
<body>

<main class="container">

<section class="">
    <?php 

    if(isset($_SESSION["usuario"])){  
        echo 'Bienvenido '.$_SESSION["usuario"]["nombre"];  
    }
    ?>
</section>

</main>
</body>
<?php
    require('views/components/footer.php')
?>
</html>
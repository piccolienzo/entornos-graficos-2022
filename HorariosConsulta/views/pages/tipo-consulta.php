<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo de Consulta</title>
    <link rel="stylesheet" href="font/fonts.css" /> 
    <link rel="stylesheet" href="styles/global.css" /> 
    <link rel="stylesheet" href="styles/tipo-consulta.css" /> 
</head>
<body>

<?php require('../components/header.php'); ?>

<main class="container">
    <h1>Tipo de Consulta</h1>
<section class="card">
    <h2>¿Cómo desea buscar su consulta? *</h2>
    <form action="../../controllers/consultations/consultations.php" method="GET">
        <input type="hidden" id="thisurl" name="backurl">
        <label  for="materia" class="check"> &nbsp
            <input type="radio" id="materia" name="searchtype" value="materia">
            <span class="checkmarkk" id="chm"></span>
        </label>
        <label  for="profesor" class="check"> &nbsp
            <input type="radio" id="profesor" name="searchtype" value="profesor">
            <span class="checkmark" id="chp"></span>
        </label>
        
        <input type="text" id="busqueda" name="search" class="input-white input-bordered select" style="display:none;" required>

        <button type="submit" id="submit" class="btn btn-violeta" style="display:none;"> 
            Continuar<span class="icon-entrar"></span>
        </button>
        <button type="button" id="next" class="btn btn-violeta" > 
            Continuar<span class="icon-entrar"></span>
        </button>
    </form>  
</section>

</main>

<?php require('../components/footer.php'); ?>

<script>

    (function() {
        document.querySelector("#next").addEventListener("click", next);
        document.querySelector("#thisurl").value = btoa(window.location.href);
    })();

    function next(){

        if(document.querySelector("input[name=searchtype]:checked")){
            
            document.querySelectorAll(".check").forEach(function(element){
            element.style.display = "none"
            });
            document.querySelector("#next").style.display = "none";

            let bus = document.querySelector("input[name=searchtype]:checked").value;
            bus = bus == 'materia' ? 'de la materia' : 'del profesor';

            document.querySelector("h2").innerHTML = "Escriba el nombre " + bus + " a buscar"
            document.querySelector("#submit").style.display = "block";
            document.querySelector("#busqueda").style.display = "block";

            document.querySelector("#volver").addEventListener("click", back);
            document.querySelector("#volver").style.display = "block";
        }

        
    }

    function back(){
        document.querySelectorAll(".check").forEach(function(element){
            element.style.display = "block"
        });
        document.querySelector("#next").style.display = "block";

        document.querySelector("h2").innerHTML = "¿Cómo desea buscar su consulta?"
        document.querySelector("#submit").style.display = "none";
        document.querySelector("#busqueda").style.display = "none";

        document.querySelector("#volver").addEventListener("click", ()=>{})
        document.querySelector("#volver").style.display = "none";
    }
</script>

</body>
</html>


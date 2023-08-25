<?php
    extract($_POST);
    if($boton == 'Si') {
        header("Location: ../../views/pages/modificar-consulta.php");
        exit("");
    }
    else if($boton == 'No') {
        header("Location: ../../views/pages/suspender-consulta-2.php");
        exit("");
    }
    else echo
        "<p> Ha ocurrido un error </p>
        <a href='../../views/pages/suspender-consulta.php'>Volver atrás</a>"
?>
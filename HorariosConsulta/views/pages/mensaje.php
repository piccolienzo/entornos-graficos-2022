<?php
    echo "Logo de éxito/error
    Mensaje
    Redirección";

    echo"Traer redirección y mensaje por querystring";

    extract($_REQUEST);
    if(isset($redireccion)) header($redireccion);
    else header("Location: ../../index.php");
?>
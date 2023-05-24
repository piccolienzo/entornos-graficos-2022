<?php

    include('../connection.inc');

    extract($_GET);

    $query = "update usuarios set "
        ."habilitado = ".($habilitado ? '0' : '1')
        ." where id = ".$id;

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    header("Location: ../../views/pages/listado-usuarios.php?success=".($habilitado ? 'disabled' : 'enabled'));
?>

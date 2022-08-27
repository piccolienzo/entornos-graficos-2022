<?php
    session_start();
    extract($_GET);

    include("../connection.inc");

    $query = "select * from usuarios";
    if( isset($textSearch) ) $query .= " where legajo like '%".$textSearch."%' or nombre like '%".$textSearch."%' or apellido like '%".$textSearch."%'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }
    $_SESSION["resultados_usuario"] = $array;

    mysqli_close($link);

    header("Location: ../../views/pages/listado-usuarios.php");
?>
<?php
    session_start();
    include('../connection.inc');
    extract($_GET);

    $query = "select * from profesores inner join usuarios on profesores.idUsuario = usuarios.id";
    if(isset($textSearch)) $query .= " where nombre like '%".$textSearch."%' or apellido like '%".$textSearch."%' or legajo like '%".$textSearch."%'";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $array = array();
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row);
    }
    $_SESSION["resultados_profesores"] = $array;

    mysqli_close($link);

    $idParam = isset($id) ? "?id=".$id : "";

    $backurlParam = isset($backurl)
        ?  isset($id)
            ? "&backurl=".$backurl
            : "?backurl=".$backurl
        :   "";

    header("Location: ../../views/pages/".$nextPage.$idParam.$backurlParam);
?>
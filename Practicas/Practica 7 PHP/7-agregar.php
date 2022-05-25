<?php 
    session_start(); 
    extract($_REQUEST); 
    include ("conexion.inc");
    if(!isset($cantidad)){
        $cantidad=1;
    } 
    $query = mysqli_query($link, "select * from catalogo where id='".$id."'"); 
    $row = mysqli_fetch_array($query); 

    if(isset($_SESSION['carro'])){
        $carro = $_SESSION['carro']; 
    }
    
    $carro[md5($id)] = array('identificador' => md5($id), 'cantidad' => $cantidad,
        'producto'=> $row['producto'], 'precio' => $row['precio'], 'id' => $id); 

    $_SESSION['carro'] = $carro; 

    header("Location:7-catalogo.php?".SID); 
?>
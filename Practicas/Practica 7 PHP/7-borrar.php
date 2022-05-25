<?php 
    session_start(); 
    extract($_GET); 
    $carro = $_SESSION['carro']; 
    unset($carro[md5($id)]); 
    $_SESSION['carro'] = $carro; 
    header("Location:7-catalogo.php?".SID); 
?>
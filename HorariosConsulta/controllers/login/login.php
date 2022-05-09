<?php 
const PASSWORD_DEF = 'pass';
const LEGAJO = 'k123';

$legajo =  htmlspecialchars($_POST['legajo']);
$password =  htmlspecialchars($_POST['password']);

if($legajo != LEGAJO && $password != PASSWORD_DEF){
    echo 'err';
}
else{
    echo $password;
    echo $legajo;
    header("Location: /horariosconsulta/views/tipo-consulta.php");
    exit();
}
 

?>
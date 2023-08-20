<?php   
require "SMTP/Exception.php";
require "SMTP/PHPMailer.php";
require "SMTP/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    function sendEmail($toMail, $toName , $mailBody, $mailType ){
        try{
        $subject = "";
        if($mailType == 1){
            $subject = "Inscripcion a consulta exitosa";
        }
        else if($mailType == 2) {
            $subject = "Nuevo contacto desde el sitio de consultas";
        }
        else if($mailType == 3) {
            $subject = "Nueva clave";
        }
        else if($mailType == 4) {
            $subject = "Ya tienes un usuario para acceder al sitio web de consultas de la UTN";
        }
        else {
            $subject = "Consulta modificada";
        }

        $mail = new PHPMailer();
        $mail -> isSMTP();
        $mail -> Host="smtp.gmail.com";
        $mail->Port=587;
        $mail->SMTPSecure="tls";
        $mail->SMTPAuth=true;
        $mail -> Username = "horariosconsultaeg@gmail.com";
        $mail -> Password = "nthxhfwfatqemujv";
        $mail -> setFrom("horariosconsultaeg@gmail.com","Horarios Consulta");
        $mail -> addAddress($toMail, $toName);
        $mail -> Subject = $subject;
        $mail -> msgHTML($mailBody);      
          
        $result = $mail -> send();
          echo $result;   
         
        }
        catch(Exception $e){
            echo $e;
           
        }
//jt1}!=uybRx1)Y5y
//horariosconsultaeg@gmail.com



    }

?>
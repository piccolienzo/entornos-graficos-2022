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

        $mail = new PHPMailer();
        $mail -> isSMTP();
        $mail -> Host="smtp.gmail.com";
        $mail->Port=587;
        $mail->SMTPSecure="tls";
        $mail->SMTPAuth=true;
        $mail -> Username = "horariosconsultaeg@gmail.com";
        $mail -> Password = "jt1}!=uybRx1)Y5y";
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
<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               

$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = '#';                 
$mail->Password = '#';                           
$mail->SMTPSecure = 'tls';                             
$mail->Port = 587;                                    

$mail->isHTML(true);    



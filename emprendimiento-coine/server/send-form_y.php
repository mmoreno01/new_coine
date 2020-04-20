<?php
require "server/phpmailer/class.phpmailer.php";
require "server/phpmailer/class.smtp.php";
require "server/phpmailer/PHPMailerAutoload.php";
$email_user = "isra.fing";
$email_password = "zA422/*9x";
$the_subject = "Phpmailer prueba by Evilnapsis.com";
$address_to = "isra.fing@gmail.com";
$from_name = "Evilnapsis";
$phpmailer = new PHPMailer(true);
// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
//$mail->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
$phpmailer->setFrom($mail->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email
$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>Hola Mundo!</h1>";
$phpmailer->Body .= "<p>Mensaje personalizado</p>";
$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
$phpmailer->IsHTML(true);
$exito = $phpmailer->send()

$intentos=1; 
while ((!$exito) && ($intentos < 5)) {
  sleep(5);
       //echo $mail->ErrorInfo;
       $exito = $phpmail-<er>Send();
       $intentos=$intentos+1;	
  
 }

      
 if(!$exito)
 {
  echo "Problemas enviando correo electrónico a ".$valor;
  echo "<br/>".$phpmailer->ErrorInfo;	
 }
 else
 {
  echo "Mensaje enviado correctamente";
 } 
?>
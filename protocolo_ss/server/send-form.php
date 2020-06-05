<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>

<?php
	require 'connect.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
	require 'phpmailer/class.smtp.php';


	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	//$bussines=$_POST['bussines'];
	//$sector=$_POST['sector'];
	$mensaje=$_POST['mensaje'];


	//in your php ignore any submissions that inlcude this field
	if(!empty($_POST['website'])) die();


	$template = file_get_contents('../MailAdminForm.html');
	$template = str_replace('%name%', $name, $template);
	$template = str_replace('%email%', $email, $template);
	$template = str_replace('%phone%', $phone, $template);
	//$template = str_replace('%bussines%', $bussines, $template);
	//$template = str_replace('%sector%', $sector, $template);
	$template = str_replace('%mensaje%', $mensaje, $template);


	$mail = new PHPMailer;
	$mail->isSMTP(); 
	//$mail->Host = 'mail.coine.lat';
	//$mail->SMTPAuth = true;
	//$mail->Mailer = 'smtp';
//	$mail->Username = 'web@coine.lat'; // Correo completo a utilizar
//	$mail->Password = 'zA422/*1x'; // Contraseña
//	$mail->SMTPSecure = 'ttl';
//	$mail->Port = 26; // Puerto a utilizar
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
$mail->Port = 25; 
	$mail->addReplyTo('info@coine.lat');
	$mail->From = 'info@coine.lat';
	$mail->FromName = 'coine | Nuevo correo';
	$mail->AddAddress('info@coine.lat'); // Esta es la dirección a donde enviamos
	//$mail->AddAddress('miguel.moreno@cclusterc.com.mx'); // Esta es la dirección a donde enviamos
	$mail->addBCC('isra.fing@gmail.com');
	$mail->isHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->MsgHTML($message);
	$mail->SetFrom('web@coine.lat', 'Coine');
	$mail->Subject = 'Nuevo Correo'; 
	$mail->Body = $template;
		
//Lo sentimos algo ha salido mal, porfavor intentelo más tarde. Gracias           window.location="http://www.coine.lat/";

if($mail->Send()) {
    echo '<script type="text/javascript">
		  alert("Tu mensaje fue enviado, pronto nos contactaremos. Gracias");
		  window.location="http://www.coine.lat/";
         </script>';
} else{
 echo '<script type="text/javascript">
 alert("Tu mensaje fue enviado, pronto nos contactaremos. Gracias");
 window.location="http://www.coine.lat/";
 </script>';
 
}
?>

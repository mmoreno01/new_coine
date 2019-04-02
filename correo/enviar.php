<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>


<?php
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
	require 'phpmailer/class.smtp.php';

	$name=$_POST['Nombre'];
	$email=$_POST['Correo'];
	$phone=$_POST['Telefono'];
	$message=$_POST['mensaje'];
    $contenido = "Nombre:". $name. "\nCorreo:". $email. "\nTélefono:". $phone. "\nmensaje:".$message;

	$template = str_replace('%Nombre%', $name, $template);
	$template = str_replace('%Correo%', $email, $template);
	$template = str_replace('%Telefono%', $phone, $template);
	$template = str_replace('%mensaje%', $message, $template);
	
		$mail = new PHPMailer;
		$mail->isSMTP(); 
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
	    $mail->Mailer = 'smtp';
		$mail->Username = '************************'; // Correo completo a utilizar
		$mail->Password = '**************'; // Contraseña
        $mail->SMTPSecure = 'tls';
		$mail->Port = 587; // Puerto a utilizar
		$mail->From = '*************************';
		$mail->FromName = 'coine | Nuevo correo';
		$mail->AddAddress('*********************'); // Esta es la dirección a donde enviamos
		$mail->isHTML(true);
	    $mail->CharSet = 'UTF-8';
        $mail->MsgHTML($message);
        $mail->SetFrom('***********************', 'Coine');
		$mail->Subject = 'Nuevo Correo'; 
        //$mail->AltBody =($contenido); 
         //var_dump($mail);
		$mail->Body ="
		<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html>
		<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
		 
		<title>Mensaje de Envío</title>
		 
		<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
		 
		</head>
		<body style='margin: 0; padding: 0;'>
		
		<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
				<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
					<tr>
						<td bgcolor='#005c9b' style='padding: 0px 0 0px 0;'>
							<center><img  src= https://pbs.twimg.com/profile_banners/846455046317465600/1535751116/1500x500
								style='display: block; width: 100%; height: 100%; margin:0px;'/> </center>    
						</td>
					</tr>
					<tr>    
						<td style='padding: 40px 30px 40px 30px;'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td style='color:#005c9b; padding: 10px 10px 10px 10px; text-align: center; font-weight: bold;'>
											<h1>Consejo Internacional de Empresarios</h1>
											<h2>(COINE)</h2>
										</td>
									</tr>
									<tr>
										<td style='color:#005c9b; padding: 10px 10px 10px 10px; text-align: center;'>
											<p style='font-size:18px;'>Mensaje:<strong>$message</strong></p>
										</td>
									</tr>
									 <tr>
										<td style='color:#005c9b; padding: 10px 10px 10px 10px; text-align: center;'>
											<p style='font-size:18px;'>E-mail:<strong>$email</strong></p>
										</td>
									 </tr>
								   
								</table>
						</td>
					</tr>
					<tr>
					<td bgcolor='#005c9b' style='border:none;'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' >
							<tr>
								<td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
									Nombre:<strong> $name</strong>
								</td>
								<td style='font-size: 0; line-height: 0;' width='20'>
									&nbsp;
								</td>
								<td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
									Télefono:<strong> $phone</strong>
								</td>
							</tr>
						</table>    
					</td>
					</tr>
					   <td bgcolor='#005c9b' style='border:none;'>
						<table  border='0' cellpadding='0' cellspacing='0' width='100%'>
							<tr>
								
								<td width='260' valign='top' style='color:white; padding: 20px 0px 20px 10px; text-align: center; font-weight: bold'>
										2018   l  Consejo Internacional de Empresarios ®
								</td>
							</tr>
						</table>
					</td>  
		</table>
		</body>
		</html>";

	 if(!$mail->Send()) {
		 header('Location: ../error.html');
		/*echo 'Mailer Error: ' . $mail->ErrorInfo;*/ 
	} else{
		 header('Location: ../correo.html');
		
	 }
?>

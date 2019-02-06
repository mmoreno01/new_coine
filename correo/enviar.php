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
	// print_r($_POST);

	$template = str_replace('%Nombre%', $name, $template);
	$template = str_replace('%Correo%', $email, $template);
	$template = str_replace('%Telefono%', $phone, $template);
	$template = str_replace('%mensaje%', $message, $template);
	
		$mail = new PHPMailer;
		$mail->isSMTP(); 
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
	    $mail->Mailer = 'smtp';
		$mail->Username = '***************************************'; // Correo completo a utilizar
		$mail->Password = '*********'; // Contraseña
        $mail->SMTPSecure = 'tls';
		$mail->Port = 587; // Puerto a utilizar
		$mail->From = '***********************************+';
		$mail->FromName = 'coine | Nuevo correo';
		$mail->AddAddress('********************'); // Esta es la dirección a donde enviamos
		$mail->isHTML(true);
	    $mail->CharSet = 'UTF-8';
        $mail->MsgHTML($message);
        $mail->SetFrom('*******************************+', 'Coine');
		$mail->Subject = 'Nuevo Correo'; 
        //$mail->AltBody =($contenido); 
         //var_dump($mail);
		$mail->Body ="
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<link href='https://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Poppins:200' rel='stylesheet'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/> 
</head>
<body style='margin: 0; padding: 0;'>

<table width='100%' bgcolor='#ffffff' style='border:1px solid #CCCCCC; color: #696969; border-collapse: collapse; padding:15px 10px 20px 10px; margin: 5px 0;'>
<tr>
</tr>

<table align='left' border='0' cellpadding='0' cellspacing='0' width='50%' bgcolor='FFFFFF'>
							<tbody>
                                <tr>
								  <td width='240' align='rigth' valign='top' ><img  src= https://scontent-dfw5-1.xx.fbcdn.net/v/t1.0-9/18527573_1896846423888665_421359503779796543_n.jpg?_nc_cat=105&_nc_ht=scontent-dfw5-1.xx&oh=736938eb3d0be89fe7e594fb32e58eba&oe=5CA86683
                                  style='display: block; width: 100px; height: 100px; margin:10px;'/></td>
                                  <td width='400' align='left' valign='top' style='font-family:Arial, Helvetica, sans-serif;padding-right:10px;'>
                                    <p style='font-size:20px;font-weight:bold;border-bottom:1px solid #CCC;padding-bottom:10px;'>Consejo Internacional de Empresarios</p>
                                    <p style='font-size:12px;'>Mensaje:<strong>$message</strong></p>
                                 
							  </tr>
							</tbody>
</table>

<table align='left' border='0' cellpadding='0' cellspacing='0' width='50%'>
							<tbody>
								<tr>
									<td align='left' valign='top' bgcolor='#005c9b' style='padding:18px 20px 10px 20px;color:#FFFFFF; font-family:Arial, Helvetica, sans-serif;font-weight:normal; font-size:14px;'>Nombre:<strong> $name</strong>
                                    </td>
                                    <td align='left' valign='top' bgcolor='#005c9b' style='padding:18px 20px 10px 20px;color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-weight:normal;font-size:14px;'>Télefono:<strong> $phone</strong>
                                    </td>
							  </tr>
							  </tr>
							</tbody>
						</table>
                        
<table align='left' border='0' cellpadding='0' cellspacing='0' width='50%'>
							<tbody>
								<tr>
                             
							  </tr>
							  </tr>
							</tbody>
						</table>

</tr>
</table>
</body>
</html>";

	 if(!$mail->Send()) {
		 header('Location: ../index.html');
		/*echo 'Mailer Error: ' . $mail->ErrorInfo;*/ 
	} else{
		 header('Location: ../correo.html');
		
	 }
?>

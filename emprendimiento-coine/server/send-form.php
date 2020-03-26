<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>

<?php
	// require 'connect.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
	require 'phpmailer/class.smtp.php';
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];

	// print_r($_POST);

	$template = file_get_contents('../server/MailAdminForm.html');
	$template = str_replace('%name%', $name, $template);
	$template = str_replace('%email%', $email, $template);
	$template = str_replace('%message%', $message, $template);
	

	
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
	
		$mail->Username = 'migue.moreno01@gmail.com';
		$mail->Password = 'Mibyker.23';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->From = 'migue.moreno01@gmail.com';
		$mail->FromName = 'talentland | Nuevo registro';
		$mail->addAddress('miguel.moreno@cclusterc.com.mx'); 
		$mail->isHTML(true);
	  $mail->CharSet = 'UTF-8';
		$mail->Subject = 'Nuevo registro de contacto'; 
		$mail->Body = $template;
    // print_r($mail);

	 if(!$mail->Send()) {
		echo "<script>
		alert('Error de envio, Vuelve a intentarlo');
		window.location= '../index.html'
		</script>";
			
			} else {
			
				echo "<script>
                alert('Tu mensaje fue enviado exitosamente, muchas gracias');
                window.location= '../index.html'
    			</script>";
			
			}
			?>

			
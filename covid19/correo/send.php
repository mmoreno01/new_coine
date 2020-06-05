<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>

<?php
	// require 'connect.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
	require 'phpmailer/class.smtp.php';


//verificacion del recaptcha
// $recaptcha = $_POST["g-recaptcha-response"];
 
// 	$url = 'https://www.google.com/recaptcha/api/siteverify';
// 	$data = array(
// 		'secret' => '6LfKxn4UAAAAAMg2GZhOEnAzPWr2PDrTrwFsQ7lZ',
// 		'response' => $recaptcha
// 	);
// 	$options = array(
// 		'http' => array (
// 			'method' => 'POST',
// 			'content' => http_build_query($data)
// 		)
// 	);
	
// 	$context  = stream_context_create($options);
// 	$verify = file_get_contents($url, false, $context);
// 	var_dump($verify);
// 	$captcha_success = json_decode($verify);

// 	if ($captcha_success->success) {
// 		// No eres un robot, continuamos con el envío del email
// 		// ...
// 		// ...
// 	} else {
// 		// Eres un robot!
// 	}
// // fin verificacion del recaptcha




	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$bussines=$_POST['bussines'];
	$cargo=$_POST['cargo'];
	$industries=$_POST['industries'];
	$message=$_POST['message'];


	//in your php ignore any submissions that inlcude this field
	if(!empty($_POST['website'])) die();


	$template = file_get_contents('../MailAdminForm.html');
	$template = str_replace('%name%', $name, $template);
	$template = str_replace('%email%', $email, $template);
	$template = str_replace('%phone%', $phone, $template);
	$template = str_replace('%bussines%', $bussines, $template);
	$template = str_replace('%cargo%', $cargo, $template);
	$template = str_replace('%industries%', $industries, $template);
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
		$mail->FromName = 'Mobirama | Nuevo registro';
		$mail->addAddress('raul.garcia@mobirama.com.mx');
		$mail->addAddress('info@mobirama.com.mx');
		$mail->addAddress('byker.23@gmail.com');
		$mail->isHTML(true);
	  	$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Nuevo registro de contacto'; 
		$mail->Body = $template;
		// var_dump($db);
		
		if ($mail->send()) {
			

			echo"<script type=\"text/javascript\">alert('Mensaje enviado, en breve nos pondremos en contacto '); window.location=' http://www.mobirama.com.mx';</script>";  
		
			// echo "exito";
			// header('Location: ../thanksyou.html');
		 	// $sql = "INSERT INTO registros ( name, email, phone, bussines, cargo, industries, message) VALUES ('$name','$email', '$phone', '$bussines', '$cargo', '$industries', '$industries', '$message')";
			// $saveDB = mysqli_query($db, $sql);

			
		  } else {
			echo"<script type=\"text/javascript\">alert('error de envio'); window.location='../index.html';</script>";  
			// echo '<script type="text/javascript"> setTimeout(function () { swal("WOW!","Message!","success"); }, 1000);</script>';
			// header('Location: ../failure.html');
		//	/*echo 'Mailer Error: ' . $mail->ErrorInfo;*/
		  }
?>

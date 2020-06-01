<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>


<?php
   require 'connectman.php';
    
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
    require 'phpmailer/class.smtp.php';

    $empresa=$_POST['inputEmpresa'];
    $nombre=$_POST['inputName'];
    $email=$_POST['inputEmail'];
    $telefono=$_POST['inputTelefono'];

    $link="www.coine.lat/dwn/man/MANUAL_COINE.zip";

    $template3 = file_get_contents('../correo/registropro3.html');
    $template3 = str_replace('%link%', $link, $template3);

      // MAil de respuiesta
        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->Host = 'mail.coine.lat';
        $mail->SMTPAuth = true;
        $mail->Mailer = 'smtp';
        $mail->Username = 'web@coine.lat'; // Correo completo a utilizar
        $mail->Password = 'zA422/*1x'; // Contraseña
        $mail->SMTPSecure = 'ttl';
        $mail->Port = 26; // Puerto a utilizar

        $mail->addReplyTo('info.contacto@coine.lat');
		$mail->From = 'web@coine.lat';
        $mail->FromName = 'COINE';
        $mail->AddAddress($email);
		$mail->isHTML(true);
	    $mail->CharSet = 'UTF-8';
        //$mail->MsgHTML($message);
        $mail->SetFrom('info.contacto@coine.lat', 'Coine');
		$mail->Subject = 'Descarga de manual COINE'; 
        //$mail->AltBody =($contenido); 
        $mail->Body = $template3;
        //var_dump($mail);

//        window.location="http://www.coine.lat/";

	 if($mail->Send()) {
           echo '<script type="text/javascript">
                 alert("Registro Exitoso, Porfavor revise su bandeja de correo para la descraga del Manual y agregenos a su lista de contactos. Gracias");
                 window.location="http://www.coine.lat/";
                </script>';
	} else{
        echo '<script type="text/javascript">
        alert("Registro Exitoso, Porfavor revise su bandeja de correo para la descraga del Manual y agregenos a su lista de contactos. Gracias");
        window.location="http://www.coine.lat/";
        </script>';
		
	 }
?>

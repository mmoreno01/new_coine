<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>


<?php
   require 'connectman.php';
    
	//require 'phpmailer/PHPMailerAutoload.php';
	//require 'phpmailer/class.phpmailer.php';
	//require 'phpmailer/class.smtp.php';

    $empresa=$_POST['inputEmpresa'];
    $nombre=$_POST['inputName'];
    $email=$_POST['inputEmail'];
    $telefono=$_POST['inputTelefono'];

    $link="www.coine.lat/dwn/man/MANUAL_COINE.pdf";


    
	//$template = file_get_contents('../correo/registropro.html');
	//$template = str_replace('%nlegal%', $nlegal, $template);


    $template3 = file_get_contents('../correo/registropro3.html');
    $template3 = str_replace('%link%', $link, $template3);

    $destinatario = $email; 
    $asunto = "Descarga de manual COINE"; 
    $cuerpo = " 
    <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html>
    <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
     
    <title>Mensaje de Envío</title>
     
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
     
    </head>
    <body style='margin: 0; padding: 0;'>
    
    <table style='text-align: center;' width='600'>
            <table style='text-align: center;' align='center' cellpadding='0' cellspacing='0' width='600'>
                <tr>
                    <td style='background-color: #005c9b; padding: 0px 0 0px 0; text-align: center;'>
                        <center><img  src= https://pbs.twimg.com/profile_banners/846455046317465600/1535751116/1500x500
                            style='display: block; width: 100%; height: 100%; margin:0px;'/> </center>    
                    </td>
                </tr>
                <tr>    
                    <td style='padding: 40px 30px 40px 30px;'>
                            <table cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td  style='color:#005c9b; padding: 10px 10px 10px 10px; text-align: center; font-weight: bold;' colspan='2'>
                                        <h1>Consejo Internacional de Empresarios</h1>
                                        <h2>(COINE)</h2>
                                        <h2>Descargue el Manual en la siguiente liga</h2>
                                        <a href='www.coine.lat/dwn/man/MANUAL_COINE.pdf'><h2>www.coine.lat/dwn/man/MANUAL_COINE.pdf</h2></a>
                                    </td>
                                </tr>                           
                            </table>
                    </td>
                </tr>
    
    
               
    
                   <td style='background-color: #005c9b; border:none;'>
                    <table cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                            
                            <td width='260' valign='top' style='color:white; padding: 20px 0px 20px 10px; text-align: center; font-weight: bold'>
                                    2020   l  Consejo Internacional de Empresarios ®
                            </td>
                        </tr>
                    </table>
                </td>  
    </table>
    </body>
    </html>
    "; 
    
    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    
    //dirección del remitente 
    $headers .= "From: COINE <info@coine.lat>\r\n"; 
    
    //dirección de respuesta, si queremos que sea distinta que la del remitente 
    $headers .= "Reply-To: info@coine.lat\r\n"; 
    
    //ruta del mensaje desde origen a destino 
    //$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 
    
    //direcciones que recibián copia 
    //$headers .= "Cc: maria@desarrolloweb.com\r\n"; 
    
    //direcciones que recibirán copia oculta 
    //$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 
    
    //mail($destinatario,$asunto,$cuerpo,$headers) 

	
      // MAil de respuiesta
        // $mail = new PHPMailer;
		// $mail->isSMTP(); 
		// $mail->Host = 'smtp.gmail.com';
		// $mail->SMTPAuth = true;
	    // $mail->Mailer = 'smtp';
		// $mail->Username = 'comunicaciones.coineweb@gmail.com'; // Correo completo a utilizar
		// $mail->Password = 'C01n3.2018@'; // Contraseña
        // $mail->SMTPSecure = 'ttl';
        // $mail->Port = 587; // Puerto a utilizar

		// $mail->From = 'info.contacto@coine.lat';
        // $mail->FromName = 'COINE';
        // $mail->AddAddress($email);
		// $mail->isHTML(true);
	    // $mail->CharSet = 'UTF-8';
        // $mail->SetFrom('info.contacto@coine.lat', 'Coine');
		// $mail->Subject = 'Descarga de manual COINE'; 
        // $mail->Body = $template3;
        //var_dump($mail);

//        window.location="http://www.coine.lat/";

	 if(mail($destinatario,$asunto,$cuerpo,$headers)) {
           echo '<script type="text/javascript">
                 alert("Registro Exitoso, Por favor revise su bandeja de correo para la descarga del Manual y agréguenos a su lista de contactos. Gracias");
                 window.location="http://www.coine.lat/";
                </script>';
	} else{
        echo '<script type="text/javascript">
        alert("Lo sentimos algo ha salido mal, por favor inténtelo más tarde. Gracias");
        window.location="http://www.coine.lat/";
        </script>';
		
	 }
?>

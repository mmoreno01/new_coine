<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>


<?php
	require 'connectbp.php';

	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
	require 'phpmailer/class.smtp.php';

    $empresa=$_POST['empresa'];
	$nombre=$_POST['nombre'];
	$correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    
    $tipo=$_POST['tipo'];
    $caracteristicas=$_POST['caracteristicas'];
    $presentacion=$_POST['presentacion'];
    $precio=$_POST['precio'];
    $certificacion=$_POST['certificacion'];

    $pais=$_POST['pais'];
    $localidad=$_POST['localidad'];
    $capacidad=$_POST['capacidad'];
    $stock=$_POST['stock'];
    $fechaentrega=$_POST['fechaentrega'];

    
    $contenido = "Nombre:". $name. "\nCorreo:". $email. "\nTélefono:". $phone. "\nmensaje:".$message;

	$template = str_replace('%Nombre%', $name, $template);
	$template = str_replace('%Correo%', $email, $template);
	$template = str_replace('%Telefono%', $phone, $template);
	$template = str_replace('%mensaje%', $message, $template);
	
	
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
		$mail->From = 'info.contacto@coine.org.mx';
        $mail->FromName = 'Proveedores | Nuevo correo';
        $mail->AddAddress('gerardo.castrejon@coine.lat');
        $mail->AddAddress('info.contacto@coine.lat'); // Esta es la dirección a donde enviamos
        $mail->addBCC('miguel.moreno@cclusterc.com.mx'); // Esta es la dirección a donde enviamos
        $mail->addBCC('isra.fing@gmail.com');
		$mail->isHTML(true);
	    $mail->CharSet = 'UTF-8';
        $mail->MsgHTML($message);
        $mail->SetFrom('comunicaciones.coineweb@gmail.com', 'Coine Proveedor');
		$mail->Subject = 'Nuevo Proveedor'; 
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
                                    <h2>PROVEEDOR</h2>

                                </td>
                            </tr>

                             <tr>
                                <td style='color:#005c9b; padding: 10px 10px 10px 10px; text-align: center;'>
                                    <p style='font-size:18px;'>Empresa:<strong>$empresa</strong></p>
                                    <p style='font-size:18px;'>Nombre:<strong>$nombre</strong></p>
                                    <p style='font-size:18px;'>E-mail:<strong>$correo</strong></p>
                                    <p style='font-size:18px;'>Teléfono:<strong>$telefono</strong></p>
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
                            Tipo:<strong> $tipo</strong>
                        </td>
                        <td style='font-size: 0; line-height: 0;' width='20'>
                            &nbsp;
                        </td>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Caracteristicas:<strong> $caracteristicas</strong>
                        </td>
                    </tr>

                    <tr>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Presentación:<strong> $presentacion</strong>
                        </td>
                        <td style='font-size: 0; line-height: 0;' width='20'>
                            &nbsp;
                        </td>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Precio:<strong> $precio</strong>
                        </td>
                    </tr>
                    <tr>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Certificación:<strong> $certificacion</strong>
                        </td>
                        <td style='font-size: 0; line-height: 0;' width='20'>
                            &nbsp;
                        </td>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Pais:<strong> $pais</strong>
                        </td>
                    </tr>
                    <tr>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Localidad:<strong> $localidad</strong>
                        </td>
                        <td style='font-size: 0; line-height: 0;' width='20'>
                            &nbsp;
                        </td>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Capacidad:<strong> $capacidad</strong>
                        </td>
                    </tr>
                    <tr>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Stock:<strong> $stock</strong>
                        </td>
                        <td style='font-size: 0; line-height: 0;' width='20'>
                            &nbsp;
                        </td>
                        <td width='260' valign='top' style='color:white; padding: 10px 10px 10px 10px; text-align: center;'>
                            Fecha de próxima entrega:<strong> $fechaentrega</strong>
                        </td>
                    </tr>
                </table>    
            </td>
            </tr>
               <td bgcolor='#005c9b' style='border:none;'>
                <table  border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        
                        <td width='260' valign='top' style='color:white; padding: 20px 0px 20px 10px; text-align: center; font-weight: bold'>
                                2020   l  Consejo Internacional de Empresarios ®
                        </td>
                    </tr>
                </table>
            </td>  
</table>
</body>
</html>";

if($mail->Send()) {
    echo '<script type="text/javascript">
          alert("Registro Exitoso. Gracias por su registro");
          window.location="http://www.coine.lat/";
         </script>';
} else{
 echo '<script type="text/javascript">
 alert("Lo sentimos algo ha salido mal, porfavor intentelo más tarde. Gracias");
 window.location="http://www.coine.lat/";
 </script>';
 
}
?>

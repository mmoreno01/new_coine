<?php
   $name=$_POST['Nombre'];
	$email=$_POST['Correo'];
	$phone=$_POST['Telefono'];
	$message=$_POST['mensaje'];
    
    $contenido = "Nombre:". $nombre. "\nCorreo:". $correo. "\nTélefono:". $telefono. "\nmensaje:".$mensaje;
    $destino="luis.mondragon@coine.lat";
    //mail($destino, "Bilanz",$contenido);
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

<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' bgcolor='FFFFFF'>
							<tbody>
                                <tr>
								  <td width='240' align='rigth' valign='top' ><img  src= https://scontent-dfw5-1.xx.fbcdn.net/v/t1.0-9/18527573_1896846423888665_421359503779796543_n.jpg?_nc_cat=105&_nc_ht=scontent-dfw5-1.xx&oh=736938eb3d0be89fe7e594fb32e58eba&oe=5CA86683
                                  style='display: block; width: 200px; height: 200px; margin:10px;'/></td>
                                  <td width='400' align='left' valign='top' style='font-family:Arial, Helvetica, sans-serif;padding-right:10px;'>
                                    <p style='font-size:20px;font-weight:bold;border-bottom:1px solid #CCC;padding-bottom:10px;'>Consejo Internacional de Empresarios</p>
                                    <p style='font-size:12px;'>Mensaje:<strong>$message</strong></p>
                                 
							  </tr>
							</tbody>
</table>

<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'>
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
                        
<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'>
							<tbody>
								<tr>
                             
							  </tr>
							  </tr>
							</tbody>
						</table>
                        
<table align='center' border='0' cellpadding='0' cellspacing='0' height='176' width='100% padding: 20px'>
							<tbody>
								<tr>
									<td bgcolor='#005c9b' style='display:block; padding-bottom:15px; font-size:12px; font-family:Helvetica, Arial, sans-serif; color:#777777;' valign='top'>
										<div style='text-align: justify; padding:20px; color:#fff;'>
											Este mensaje fue enviado a tu email por ser cliente o suscriptor de nuestra empresa y haber indicado expresamente que deseas que te comuniquemos nuestras novedades y promociones. Nuestra empresa nunca te mandará correos no solicitados ni con otros fines distintos al indicado. Nuestra empresa cumple las normativas para la lucha activa contra el correo no deseado (spam). Si no quieres recibir más emails, puedes darte de baja aquí: cancelar tu suscripción.<br />
											
											<br />
											<br />
											&nbsp;</div>
										
										<br />
										&nbsp;</td>
								</tr>
							</tbody>
						</table>


</tr>
</table>
</body>
</html>";
        if($mail->Send())
        {
            mail($destino, "Coine");
            header('Location: ../correo.html');
        }
else
        {
            header('Location: ../index.html');
        }
?>
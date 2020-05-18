<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>

<?php
    //require 'connectbpx.php';
    
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
	require 'phpmailer/class.smtp.php';

    $nlegal=$_POST['nlegal'];
    $rfc=$_POST['rfc'];
    $curp=$_POST['curp'];
    $ine=$_POST['ine'];
    
    $razon=$_POST['razon'];
    $dfiscal=$_POST['dfiscal'];
    $tel1=$_POST['tel1'];
    $tel2=$_POST['tel2'];
    $email=$_POST['email'];
    $efirma=$_POST['efirma'];
    $cif=$_POST['cif'];
    //$attacta=$_POST['attacta'];
    $lista=$_POST['lista'];
    $accionistas=$_POST['accionistas'];
    $publicaciones=$_POST['publicaciones'];
    
   // $attcv=$_POST['attcv'];
   //$attacreditacion=$_POST['attacreditacion'];
    
    $complementarios=$_POST['complementarios'];
    
    $tclientes=$_POST['tclientes'];
    
    $exitos=$_POST['exitos'];

    
	$template = file_get_contents('../correo/registropro.html');
	$template = str_replace('%nlegal%', $nlegal, $template);
	$template = str_replace('%curp%', $curp, $template);
	$template = str_replace('%rfc%', $rfc, $template);
    $template = str_replace('%ine%', $ine, $template);
    $template = str_replace('%razon%', $razon, $template);
	$template = str_replace('%dfiscal%', $dfiscal, $template);
	$template = str_replace('%tel1%', $tel1, $template);
    $template = str_replace('%tel2%', $tel2, $template);
    $template = str_replace('%email%', $email, $template);
	$template = str_replace('%efirma%', $efirma, $template);
	$template = str_replace('%lista%', $lista, $template);
    $template = str_replace('%accionistas%', $accionistas, $template);
    $template = str_replace('%publicaciones%', $publicaciones, $template);
	$template = str_replace('%complementarios%', $complementarios, $template);
	$template = str_replace('%tclientes%', $tclientes, $template);
    $template = str_replace('%exitos%', $exitos, $template);

    $template2 = file_get_contents('../correo/registropro2.html');


	
		$mail = new PHPMailer;
		$mail->isSMTP(); 
        $mail->Host = 'mail.coine.lat';
		$mail->SMTPAuth = true;
	    $mail->Mailer = 'smtp';
		$mail->Username = 'web@coine.lat'; // Correo completo a utilizar
		$mail->Password = 'zA422/*1x'; // Contraseña
        $mail->SMTPSecure = 'ttl';
        $mail->Port = 26; // Puerto a utilizar
		$mail->From = 'info.contacto@coine.org.mx';
        $mail->FromName = 'Proveedores | Nuevo correo';
       // $mail->AddAddress('gerardo.castrejon@coine.lat');
        //$mail->AddAddress('info.contacto@coine.lat'); // Esta es la dirección a donde enviamos
        //$mail->AddAddress('miguel.moreno@cclusterc.com.mx'); // Esta es la dirección a donde enviamos
        $mail->AddAddress('isra.fing@gmail.com');
		$mail->isHTML(true);
	    $mail->CharSet = 'UTF-8';
        //$mail->MsgHTML($message);
        $mail->SetFrom('comunicaciones.coineweb@gmail.com', 'Coine Proveedor');
		$mail->Subject = 'Nuevo Comprador'; 
        //$mail->AltBody =($contenido); 
         //var_dump($mail);
        $mail->Body = $template;
        $mail->AddAttachment($_FILES["attacta"]["tmp_name"],$_FILES["attacta"]["name"]);
        $mail->AddAttachment($_FILES["attcv"]["tmp_name"],$_FILES["attcv"]["name"]);
        $mail->AddAttachment($_FILES["attacreditacion"]["tmp_name"],$_FILES["attacreditacion"]["name"]);


       // MAil de respuiesta
        $mail2 = new PHPMailer;
		$mail2->isSMTP(); 
        $mail->Host = 'mail.coine.lat';
		$mail->SMTPAuth = true;
	    $mail->Mailer = 'smtp';
		$mail->Username = 'web@coine.lat'; // Correo completo a utilizar
		$mail->Password = 'zA422/*1x'; // Contraseña
        $mail->SMTPSecure = 'ttl';
        $mail->Port = 26; // Puerto a utilizar
		$mail2->From = 'info.contacto@coine.lat';
        $mail2->FromName = 'COINE';
        $mail2->AddAddress('isra.fing@gmail.com');
		$mail2->isHTML(true);
	    $mail2->CharSet = 'UTF-8';
        //$mail2->MsgHTML($message);
        $mail2->SetFrom('info.contacto@coine.lat', 'Coine');
		$mail2->Subject = 'Registro exitoso'; 
        //$mail->AltBody =($contenido); 
         //var_dump($mail);
        $mail2->Body = $template2;
        //$mail2->Send()

        //alert("Registro Exitoso, Porfavor revise su bandeja de correo y agregenos a su lista de contactos. Gracias");
        //alert(sweetAlert("Registro Exitoso", "Porfavor revise su bandeja de correo y agregenos a su lista de contactos", "success"));


	 //if($mail->Send() && $mail2->Send()) {
		//header('Location: ../index.html');
        sweetconf();
      //  echo '<script type="text/javascript">
        //alert("Lo sentimos algo ha salido mal, porfavor intentelo más tarde. Gracias");
        //window.location="http://www.coine.lat/";
        //</script>';
		//swal(\"Registro Exitoso\", \"Porfavor revise su bandeja de correo y agregenos a su lista de contactos. Gracias\", \"success\");

    // }
function sweetconf()
{
    echo "<script>jQuery(
        function(){
            swal({
                title: 'Registro Exitoso',
                text: 'Porfavor revise su bandeja de correo y agregenos a su lista de contactos. Gracias',
                icon: 'success'})
                .then({
                    swal(`You typed:`);
                  });
            });
		</script>";

}
function sweeterror()
{
    echo "<script>jQuery(function(){swal(\"Lo sentimos algo ha salido mal\", \"porfavor intentelo más tarde. Gracias\", \"error\");});</script>";
}
?>
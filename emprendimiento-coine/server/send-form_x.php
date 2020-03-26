<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>

<?php
$destinatario = "isra.fing@gmail.com"; 
$asunto = "Nuevo registro d etalent"; 

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Comentarios: " . $_POST['message'] . "\n\n";

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Talentland\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: isra.fing@gmail.com\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: isra.fing@gmail.com\\r\n"; 


mail($destinatario,$asunto,$email_message,$headers) 

?>

<?php 
     echo "<script>
                alert('Tu mensaje fue enviado, muchas gracias');
                window.location= '../index.html'
    </script>";
?>

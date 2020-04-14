
 <?php 


// }
$servername = "localhost";
$username = "forms_sites";
$password = "zA422/*9x";
$database = "forms_sites";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$nlegal=$_POST['nlegal'];
$rfc=$_POST['rfc'];
$curp=$_POST['curp'];
$ine=$_POST['ine'];

$razon=$_POST['razon'];16
$dfiscal=$_POST['dfiscal'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$email=$_POST['email'];
$efirma=$_POST['efirma'];
$cif=$_POST['cif'];
$attacta=$_POST['attacta'];
$lista=$_POST['lista'];
$accionistas=$_POST['accionistas'];
$publicaciones=$_POST['publicaciones'];

$attcv=$_POST['attcv'];
$attacreditacion=$_POST['attacreditacion'];

$complementarios=$_POST['complementarios'];

$tclientes=$_POST['tclientes'];

$exitos=$_POST['exitos'];



$sql = "INSERT INTO procoine (nlegal, rfc, curp, ine, razon, dfiscal, tel1, tel2, email, efirma, cif, attacta, lista, accionistas, publicaciones, attcv, attacreditacion, complementarios, tclientes, exitos) 
VALUES ($nlegal', '$rfc', '$curp', '$ine', '$razon', '$dfiscal', '$tel1', '$tel2', '$email', '$efirma', '$cif', '$attacta', '$lista', '$accionistas', '$publicaciones', '$attcv', '$attacreditacion', '$complementarios', '$tclientes', '$exitos')";
//var_dump($sql);
if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


 
// $nombre =  $_POST['nombre'];
// $correo = $_POST['correo'];

// $sql = "INSERT INTO Registros (nombre,correo) VALUES ('$nombre','$correo')";
// $sql = "INSERT INTO registros ( name, email, phone, bussines, cargo, industries, message) VALUES ('$name','$email', '$phone', '$bussines', '$cargo', '$industries', '$industries', '$message')";
// if (mysqli_query($conn, $sql)) {
//       echo "New record created successfully";



//     } else {
//       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
// mysqli_close($conn);

?>




 <?php 


// }
$servername = "localhost";
$username = "coine_forms";
$password = "zA422/*9x";
$database = "coine_forms_sites";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


$nombre=$_POST['name'];
$correo=$_POST['email'];
$telefono=$_POST['phone'];
$mensaje=$_POST['mensaje'];





$sql = "INSERT INTO pss (nombre, correo, telefono, mensaje) 
VALUES ('$nombre','$correo','$telefono','$mensaje')";
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



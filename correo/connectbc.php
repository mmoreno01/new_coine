
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
// echo "Connected successfully";


$empresa=$_POST['empresa'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];

$tipo=$_POST['tipo'];
$caracteristicas=$_POST['caracteristicas'];
$presentacion=$_POST['presentacion'];
$precio=$_POST['precio'];

$localidad=$_POST['localidad'];



$sql = "INSERT INTO salescoine (poc, empresa, nombre, correo, telefono, tipo, caracteristicas, presentacion, precio, localidad) 
VALUES ('Comprador','$empresa','$nombre','$correo','$telefono','$tipo','$caracteristicas','$presentacion','$precio','$localidad')";
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



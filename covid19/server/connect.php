
 <?php 
	// $db = mysqli_connect('localhost', 'mobirama_user', '&Qb2(?-S&Lp2', 'mobirama_web'); 

	// if(mysqli_connect_errno())
	// {
	// 	echo 'Failed to connect to MySQL: '.mysqli_connect_error();
	// }


// $mysqli = new mysqli('localhost', 'mobirama_user035', '#!o5#!ccGdMM', 'mobirama_035');

// if($mysqli->connect_errno){
// 	echo "Lo sentimos, este sitio web está experimentando problemas.";

// }


$servername = "localhost";
$database = "mobirama_web";
$username = "mobirama_user";
$password = "&Qb2(?-S&Lp2";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$bussines=$_POST['bussines'];
$cargo=$_POST['cargo'];
$industries=$_POST['industries'];
$message=$_POST['message'];


$sql = "INSERT INTO registros (name, email, phone, bussines, cargo, industries, message) VALUES ('$name','$email', '$phone', '$bussines', '$cargo', '$industries', '$message')";
// var_dump($sql);
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



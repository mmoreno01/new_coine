
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
//echo "Connected successfully";


$empresa=$_POST['inputEmpresa'];
$nombre=$_POST['inputName'];
$email=$_POST['inputEmail'];
$telefono=$_POST['inputTelefono'];


$sql = "INSERT INTO desmanual (empresa, nombre, correo, telefono) 
VALUES ('$empresa','$nombre','$email','$telefono')";
//var_dump($sql);
if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>



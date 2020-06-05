<?php
require 'conexion.php';


//Leer Registros

$sql_read = 'SELECT * FROM  registros';
$gsent = $pdo->prepare($sql_read);
$gsent->execute();

$resultado = $gsent->fetchAll();
echo json_encode($resultado);
//Guardar Registros

$empresa = $_POST['empresa'];
$insumo = $_POST['insumo'];
$caracter = $_POST['caracter'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

// var_dump($_POST);


if($empresa === '' || $insumo === '' || $caracter === '' || $cantidad === '' || $precio === ''){
    // echo  json_encode('error');
}else {
    // echo  json_encode('Correcto: <br> empresa:' .$empresa. '<br>insumo:' .$insumo. '<br>caracter:' .$caracter.  '<br>cantidad:' .$cantidad. '<br>precio:' .$precio);

    $sql_agregar =  "INSERT INTO registros ( empresa, insumo, caracter, cantidad, precio) VALUES ( ?, ?, ?, ?, ?)";
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute( array($empresa,$insumo,$caracter,$cantidad,$precio));
    header('location: index.html');

}




                                  

?>
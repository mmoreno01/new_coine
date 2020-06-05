<?php
require 'conexion.php';


//Leer Registros

$sql_read = 'SELECT * FROM  registros';
$gsent = $pdo->prepare($sql_read);
$gsent->execute();

$resultado = $gsent->fetchAll();
echo json_encode($resultado);

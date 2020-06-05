<?php
$link = 'mysql:host=localhost;dbname=coine_covid';
$usuario='coine_usercovid';
$pass='CkEpOHb6Nq[u';

try{
    $pdo = new PDO ($link,$usuario,$pass);

    // echo 'conectado';

}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

<?php


function conectarDb(){
$conexion = 'localhost';
$usuario = 'root';
$password = 'root';
$bbdd = 'the_luxe_collection';


$db = mysqli_connect($conexion,$usuario,$password,$bbdd);

if (!$db) {
    echo 'error conexion';
    exit; 
}
return $db;
}


?>
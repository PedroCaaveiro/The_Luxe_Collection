<?php

require  'includes/config/database.php';

$db = conectarDb();


$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password,PASSWORD_DEFAULT);

$query = "INSERT INTO usuarios (email,password) VALUES ('$email','$passwordHash')";

mysqli_query( $db,$query);







?>
<?php

require_once __DIR__ . '../includes/templates/funciones.php';
require_once '../The_Luxe_Collection/includes/config/database.php';

$db = conectarDb();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (!$email) {
        $errores[] = 'El email es obligatorio o no es valido';
    }

    if (!$password) {
        $errores[] = 'El password es obligatorio';
    }
    
    if (empty($errores)) {
        
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($db,$query);
        
if ($resultado) {
    if ($resultado->num_rows) {

        $usuario = mysqli_fetch_assoc($resultado);

        $autch = password_verify($password,$usuario['password']); 

        if ($autch) {
            session_start();

            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['login'] = true;
        } else {
           $errores []= 'El password es incorrecto';
        }
        
       
    } else {
        $errores[] = "El usuario no existe";
    }
    
}

    }
}


incluirTemplate("header");

?>

<main class="contenedor seccion">
<div class= "errores" id="mensaje-creacion">
        <h3>Errores encontrados:</h3>
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    
<form action="" class="formulario" method='POST' novalidate>

<fieldset>
                <legend>Email & Password</legend>
               
                <label for="email">Email</label>
                <input type="email" placeholder="Nombre" id="email" name = 'email' required>
                <label for="password">Teléfono</label>
                <input type="password" placeholder="Password" id="password" name= 'password' required>
               
            </fieldset>
    <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

</form>


</main>

<?php
incluirTemplate("footer");
?>

<script src="../../src/js/app.js"></script>
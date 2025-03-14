<?php
session_start(); 


require_once 'includes/templates/funciones.php';




require_once 'includes/config/database.php';

$db = conectarDb();

if (isset($_SESSION['erroresLogin'])) {
    $erroresLogin = $_SESSION['erroresLogin'];
    // Elimina los errores de la sesión después de haberlos mostrado (para que no se muestren en la siguiente carga de la página)
    
}


incluirTemplate("header");

?>

<main class="contenedor seccion">
<?php if (!empty($erroresLogin)): ?>
<div class= "errores" id="mensaje-creacion">
        <h3>Errores encontrados:</h3>
        <ul>
            <?php foreach ($erroresLogin as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    
<form action="admin/propiedades/funciones.php" class="formulario" method='POST' novalidate>

<fieldset>
                <legend>Email & Password</legend>
               
                <label for="email">Email</label>
                <input type="email" placeholder="Nombre" id="email" name = 'email' required>
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" name= 'password' required>
               
            </fieldset>
    <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

</form>


</main>

<?php
incluirTemplate("footer");
?>

<script src="../../src/js/app.js"></script>
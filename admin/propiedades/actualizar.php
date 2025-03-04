<?php
require_once 'funciones.php'; 


$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}


$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']); 
require_once '../../includes/templates/funciones.php';

if (!verificarUsuario()) {
    // Si el usuario no está logueado, redirige a login.php
    header('Location: /login.php');
    exit;
}

incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <?php

if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'exito') {
    echo '<h2 id="mensaje-creacion">Propiedad creada correctamente</h2>';
}
?>

<?php if (!empty($errores)): ?>
    <div class= "errores" id="mensaje-creacion">
        <h3>Errores encontrados:</h3>
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>



    <a href="../index.php" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" action="funciones.php" enctype="multipart/form-data">

<?php
    if (isset($_SESSION['resultadoPropiedad'])) {
        $resultadoPropiedad = $_SESSION['resultadoPropiedad'];
    }
?>

<!-- 📌 Campo oculto para enviar el ID de la propiedad -->
<input type="hidden" name="id" value="<?php echo isset($resultadoPropiedad['id']) ? $resultadoPropiedad['id'] : ''; ?>">

<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $resultadoPropiedad['titulo'] ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $resultadoPropiedad['precio'] ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
    <img class="imagenPropiedad" src="../../imagenes/<?php echo htmlspecialchars($resultadoPropiedad['imagen']); ?>" alt="Imagen de la propiedad">

    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" id="descripcion"><?php echo isset($resultadoPropiedad['descripcion']) ? htmlspecialchars($resultadoPropiedad['descripcion']) : ''; ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="habitaciones" value="<?php echo $resultadoPropiedad['habitaciones'] ?>" placeholder="Habitaciones Propiedad" min="1" max="9">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Baños Propiedad" min="1" max="9" value="<?php echo $resultadoPropiedad['wc'] ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Estacionamiento Propiedad" min="1" max="9" value="<?php echo $resultadoPropiedad['estacionamiento'] ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <select name="vendedor" id="vendedor">
        <option value="">-- Seleccionar --</option>
        <option value="<?php echo isset($resultadoPropiedad['vendedores_id']) ? $resultadoPropiedad['vendedores_id'] : ''; ?>" selected>
            <?php echo isset($resultadoPropiedad['vendedores_id']) ? "Vendedor ID: " . $resultadoPropiedad['vendedores_id'] : 'Seleccione un vendedor'; ?>
        </option>
    </select>
</fieldset>

<input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
</form>

</main>

<?php
incluirTemplate("footer");
?>

<script src="../../src/js/app.js"></script>
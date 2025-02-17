


<?php

require_once 'funciones.php'; 
$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']); 
require "../../includes/templates/funciones.php";
incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
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


        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" >

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion"></textarea>

        </fieldset>
        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Habitaciones Propiedad" min="1" max="9">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Baños Propiedad" min="1" max="9" value="">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Estacionamiento Propiedad" min="1" max="9">
        </fieldset>

        <fieldset>
        <legend>Vendedor</legend>
<select name="vendedor">  
    <option value="" disabled selected>Seleccionar Vendedor</option>  
    <?php 
    if (!empty($_SESSION['vendedores'])) {
        foreach ($_SESSION['vendedores'] as $vendedor) {
            echo "<option value='" . htmlspecialchars($vendedor['id']) . "'>" . htmlspecialchars($vendedor['nombre']) . " ".  htmlspecialchars($vendedor['apellido']) . "</option>";
        }
    } else {
        echo "<option value='' disabled>No hay vendedores disponibles</option>";
    }
    ?>

</select>


        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate("footer");
?>

<script src="../../src/js/app.js"></script>
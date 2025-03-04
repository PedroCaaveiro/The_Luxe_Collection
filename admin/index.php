<?php
require_once "propiedades/funciones.php";
require_once __DIR__ . '/../includes/templates/funciones.php';

if (!verificarUsuario()) {
    // Si el usuario no está logueado, redirige a login.php
    header('Location: /login.php');
    exit;
}

incluirTemplate("header");


$propiedades = $_SESSION['propiedades'] ?? [];

?>

<main class="contenedor seccion">
    <h1>Administrador The Luxe Collection</h1>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear</a>

    <table class="propiedades">
        <thead>

            <tr>
                <th>ID</th>
                <th>titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody>



            
                <?php if (empty($propiedades)): ?>
            <tr>
                <td colspan="5">No hay propiedades disponibles.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?= $propiedad['id']; ?></td>
                    <td><?= htmlspecialchars($propiedad['titulo']); ?></td>
                    <td>
                        <img src="/imagenes/<?= htmlspecialchars($propiedad['imagen']); ?>" class="imagen-tabla" alt="Imagen de <?= htmlspecialchars($propiedad['titulo']); ?>">

                    </td>
                    <td><?= number_format($propiedad['precio'], 2, ',', '.'); ?> €</td>
                    <td>
                        <div class="acciones-container">
                            <form action="../admin/propiedades/funciones.php" method="POST">
                                <input type="hidden" name="id" value="<?= $propiedad['id']; ?>"> <!-- Enviar el ID de la propiedad -->
                                <input type="submit" name="eliminar" value="Eliminar" class="boton-rojo-block">
                            </form>
                            <a class="boton-verde-block" href="../admin/propiedades/actualizar.php?id=<?= $propiedad['id']; ?>">Actualizar</a>
                        </div>
                    </td>


                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        </tbody>


    </table>



</main>

<?php
incluirTemplate("footer");
?>

<script src="../../src/js/app.js"></script>
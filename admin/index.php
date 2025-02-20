<?php
require_once "propiedades/funciones.php";
require_once __DIR__ . '/../includes/templates/funciones.php';


incluirTemplate("header");


$propiedades = $_SESSION['propiedades'] ?? [];

?>

<main class=contenedor seccion>
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
       
            
      
<tr>
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
                        <a class="boton-rojo-block" href="eliminar.php?id=<?= $propiedad['id']; ?>">Eliminar</a>
                        <a class="boton-verde-block" href="actualizar.php?id=<?= $propiedad['id']; ?>">Actualizar</a>
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
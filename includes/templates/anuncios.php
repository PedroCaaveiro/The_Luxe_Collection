<?php

require __DIR__ . '/../config/database.php';

$db = conectarDb();

if (isset($limitar_resultados) && $limitar_resultados) {
    $limite = 3; 
    $query = "SELECT * FROM propiedades LIMIT $limite";
} else {
    $query = "SELECT * FROM propiedades"; 
}

$resultado = mysqli_query($db, $query);


?>
<div class="contenedor-anuncios ">

    <?php

    while ($propiedad = mysqli_fetch_assoc($resultado)): ?>


    <div class="anuncio"> <!--  principio anuncio-->

        <picture>
            <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" loading="lazy">
        </picture>

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio"><?php echo $propiedad['precio']; ?>&euro;</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img src="src/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>

                <li>
                    <img src="src/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>

                <li>
                    <img src="src/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>


            </ul>
            <a href="anuncio.php" class="boton boton-amarillo">Ver Propiedad</a>
        </div>
    </div> <!--fin anuncio-->



<?php endwhile; ?>
</div>

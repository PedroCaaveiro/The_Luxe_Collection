<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    
</head>

<body>
    
<?php

require_once 'includes/templates/funciones.php';
incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
        <article class="entrada-blog">
            <div class="imagen">
                <img src="src/img/blog1.jpg" alt="texto entrada blog" loading="lazy">
            </div>
            <div class="texto-entrada">
                <a href="entrada_1.php">
                    <h4>Terraza en el techo de tu casa </h4>
                    <p class="informacion-meta">Escrito el:<span>20/10/2021</span>por:<span>Admin</span></p>
                    <p>Consejos para construi una terraza en el tech de tu casa con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <img src="src/img/blog2.jpg" alt="texto entrada blog" loading="lazy">
            </div>
            <div class="texto-entrada">
                <a href="entrada_2.php">
                    <h4>Piscina Exterior </h4>
                    <p class="informacion-meta">Escrito el:<span>20/10/2021</span>por:<span>Admin</span></p>
                    <p>Consejos para construi una exterior en tu casa con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <img src="src/img/blog3.jpg" alt="texto entrada blog" loading="lazy">
            </div>
            <div class="texto-entrada">
                <a href="entrada_3.php">
                    <h4>Decoración Interiores </h4>
                    <p class="informacion-meta">Escrito el:<span>20/10/2021</span>por:<span>Admin</span></p>
                    <p>Consejos para decorar el interior de tu casa con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <img src="src/img/blog4.jpg" alt="texto entrada blog" loading="lazy">
            </div>
            <div class="texto-entrada">
                <a href="entrada_4.php">
                    <h4>Decoración habitaciones </h4>
                    <p class="informacion-meta">Escrito el:<span>20/10/2021</span>por:<span>Admin</span></p>
                    <p>Consejos para decorar habitaciones de tu casa con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>
    </main>
    <?php incluirTemplate('footer'); ?>
    <script src="src/js/app.js"></script>
</body>

</html>
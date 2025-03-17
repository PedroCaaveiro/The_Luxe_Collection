<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Luxe Collection</title>
  
</head>

<body>

<?php

require_once 'includes/templates/funciones.php';

incluirTemplate('header',true);

?>

    <main class="contenedor seccion">
        <h1>Mas sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="src/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>En nuestra inmobiliaria, la confianza y la transparencia son fundamentales. Garantizamos a nuestros clientes un proceso de compra seguro, ágil y sin sorpresas.</p>
            </div>
            <div class="icono">
                <img src="src/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Ofrecemos propiedades exclusivas con una excelente relación calidad-precio, ajustadas al mercado y sin costos ocultos. Te garantizamos transparencia total y asesoramiento para una inversión segura.</p>
            </div>
            <div class="icono">
                <img src="src/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Agilizamos todo el proceso para que puedas disfrutar de tu nuevo hogar en el menor tiempo posible. Nos encargamos de cada detalle para una compra rápida y sin complicaciones.</p>
            </div>
        </div>
    </main>

    <section class="seccion-contenedor">

        <h2>Casas y Departamentos en Venta</h2>

      
<?php

$limite = 3;
$limitar_resultados = true; 
include '../The_Luxe_Collection/includes/templates/anuncios.php';
?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Rellene el formulario de contacto y un asesor se pondra en contacto con usted en la maxima brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <img src="src/img/blog1.jpg" alt="texto entrada blog" loading="lazy">
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
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
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar </h4>
                        <p class="informacion-meta">Escrito el:<span>20/10/2021</span>por:<span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para
                            darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimonios">
            <h3>Reseñas</h3>

            <div class="reseñas">

                <blockquote>
                    El personal se comporto de manera excelente, muy atentos y la casa que me ofrecieron cumplio con
                    todas mis expectativas.

                </blockquote>
                <p>Pedro Caaveiro</p>
                </div>
        </section>
        
    </div>
   <?php incluirTemplate('footer'); ?>
    <script src="src/js/app.js"></script>
</body>

</html>
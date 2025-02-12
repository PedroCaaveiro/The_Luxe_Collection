<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Luxe Collection</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body>

<?php

require_once 'includes/templates/funciones.php';
$inicio = true;
incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Mas sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/src/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque praesentium harum doloremque
                    sapiente, voluptatibus quas tempora veritatis? Voluptas ratione dignissimos totam eaque vel
                    quibusdam quas nesciunt exercitationem, iusto placeat eveniet?</p>
            </div>
            <div class="icono">
                <img src="/src/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque praesentium harum doloremque
                    sapiente, voluptatibus quas tempora veritatis? Voluptas ratione dignissimos totam eaque vel
                    quibusdam quas nesciunt exercitationem, iusto placeat eveniet?</p>
            </div>
            <div class="icono">
                <img src="/src/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque praesentium harum doloremque
                    sapiente, voluptatibus quas tempora veritatis? Voluptas ratione dignissimos totam eaque vel
                    quibusdam quas nesciunt exercitationem, iusto placeat eveniet?</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">

        <h2>Casas y Departamentos en Venta</h2>

        <div class="contenedor-anuncios">

            <div class="anuncio"> <!--  principio anuncio-->

                <picture>
                    <img src="src/img/anuncio1.jpg" alt="anuncio" loading="lazy">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el lago</h3>
                    <p>Casa de Lujo con excelentes vistas con acabados de lujo a un excelente precio</p>
                    <p class="precio">3.000.000&euro;</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="src/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p>3</p>
                        </li>

                        <li>
                            <img src="src/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                            <p>3</p>
                        </li>

                        <li>
                            <img src="src/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                            <p>4</p>
                        </li>


                    </ul>
                    <a href="anuncios.php" class="boton boton-amarillo">Ver Propiedad</a>
                </div>
            </div> <!--fin anuncio-->

            <div class="anuncio"> <!--  principio anuncio-->

                <picture>
                    <img src="src/img/anuncio3.jpg" alt="anuncio" loading="lazy">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Mansion Con piscina</h3>
                    <p>Mansion de Lujo con una espectacular piscina a un excelente precio</p>
                    <p class="precio">6.000.000&euro;</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="src/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p>3</p>
                        </li>

                        <li>
                            <img src="src/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                            <p>3</p>
                        </li>

                        <li>
                            <img src="src/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                            <p>7</p>
                        </li>


                    </ul>
                    <a href="anuncios.php" class="boton boton-amarillo">Ver Propiedad</a>
                </div>
            </div> <!--fin anuncio-->
            <div class="anuncio"> <!--  principio anuncio-->

                <picture>
                    <img src="src/img/anuncio2.jpg" alt="anuncio" loading="lazy">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Chalet Moderno</h3>
                    <p>Chalet de Lujo con acabados de lujo a un excelente precio</p>
                    <p class="precio">2.000.000&euro;</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="src/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p>3</p>
                        </li>

                        <li>
                            <img src="src/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                            <p>3</p>
                        </li>

                        <li>
                            <img src="src/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                            <p>4</p>
                        </li>


                    </ul>
                    <a href="anuncios.php" class="boton boton-amarillo">Ver Propiedad</a>
                </div>
            </div> <!--fin anuncio-->
        </div>
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
    <?php include 'includes/templates/footer.php';?>
    <script src="src/js/app.js"></script>
</body>

</html>
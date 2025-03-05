<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body>
<?php

require_once 'includes/templates/funciones.php';
incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Conocenos</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                <img src="src/img/nosotros.jpg" alt="Sobre Nosotros" loading="lazy">
            </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>Nuestra inmobiliaria se ha consolidado como un referente en la venta de propiedades exclusivas. Nos especializamos en ofrecer hogares de alto standing que combinan diseño, confort y ubicación privilegiada, garantizando siempre un servicio personalizado y de máxima calidad.</p>
                <p>Cada propiedad que gestionamos ha sido cuidadosamente seleccionada para cumplir con los más altos estándares. Nuestro equipo de expertos trabaja con compromiso y discreción para encontrar la residencia perfecta para cada cliente, asegurando una experiencia de compra segura, ágil y totalmente satisfactoria.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/src/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>En nuestra inmobiliaria, la confianza y la transparencia son fundamentales. Garantizamos a nuestros clientes un proceso de compra seguro, ágil y sin sorpresas.</p>
            </div>
            <div class="icono">
                <img src="/src/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Ofrecemos propiedades exclusivas con una excelente relación calidad-precio, ajustadas al mercado y sin costos ocultos. Te garantizamos transparencia total y asesoramiento para una inversión segura.</p>
            </div>
            <div class="icono">
                <img src="/src/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Agilizamos todo el proceso para que puedas disfrutar de tu nuevo hogar en el menor tiempo posible. Nos encargamos de cada detalle para una compra rápida y sin complicaciones.</p>
            </div>
        </div>
    </section>
    <?php incluirTemplate('footer');?>
    <script src="src/js/app.js"></script>
</body>

</html>
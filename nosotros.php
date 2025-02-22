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
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id illo cumque nesciunt esse fuga ipsa debitis aspernatur amet odit perferendis. Corrupti ad aspernatur pariatur deleniti possimus voluptatum beatae voluptate maiores.</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto nulla, provident rerum modi itaque, id optio labore porro error molestiae sunt fugit velit, reprehenderit aliquam rem. Reiciendis quibusdam necessitatibus recusandae?</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
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
    </section>
    <?php incluirTemplate('footer');?>
    <script src="src/js/app.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Luxe Collection</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body>
 
<body>
  
<?php

require_once 'includes/templates/funciones.php';
incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
<h1>Casa junto al bosque</h1>
<picture>
    <img src="src/img/destacada.jpg" alt="imagen propiedad" loading="lazy">
</picture>
<div class="resumen-propiedad">
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
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium suscipit quaerat harum, velit hic tempore itaque quam quasi tenetur consequatur. Maxime atque beatae, explicabo alias suscipit doloribus nobis debitis eligendi?</p>
    <p>lorem</p>
</div>

</main>

<?php incluirTemplate('footer'); ?>
    <script src="src/js/app.js"></script>
</body>

</html>
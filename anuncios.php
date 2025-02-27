<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncios</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body>
<?php

require_once 'includes/templates/funciones.php';
incluirTemplate('header');

?>
    <main class="seccion-contenedor">
        <h2>Casas y Departamentos en Venta</h2>


        <?php

$limitar_resultados = false;
        
include '../The_Luxe_Collection/includes/templates/anuncios.php';
?>
        </div>
    </main>
    <?php incluirTemplate('footer'); ?>
    <script src="src/js/app.js"></script>
</body>

</html>
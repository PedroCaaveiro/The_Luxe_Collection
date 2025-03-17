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


require '../The_Luxe_Collection/includes/config/database.php';

require_once 'includes/templates/funciones.php';
incluirTemplate('header');

$db = conectarDb();

$id = filter_var($_GET['id'],FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: index.php");
    exit;
}

$query = "SELECT * FROM propiedades WHERE id = {$id}";

$resultado = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultado);

?>

<main class="contenedor seccion contenido-centrado">
<h1><?php echo $propiedad['titulo']?></h1>


    <img src="/imagenes/<?php echo $propiedad['imagen']?>" alt="imagen propiedad" loading="lazy">

<div class="resumen-propiedad">
<p class="precio"><?php echo number_format($propiedad['precio'], 2, ',', '.'); ?> &euro;</p>
    <ul class="iconos-caracteristicas">
        <li>
            <img src="src/img/icono_wc.svg" alt="icono wc" loading="lazy">
            <p><?php echo $propiedad['wc'] ?></p>
        </li>

        <li>
            <img src="src/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
            <p><?php echo $propiedad['estacionamiento'] ?></p>
        </li>

        <li>
            <img src="src/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
            <p><?php echo $propiedad['habitaciones'] ?></p>
        </li>


    </ul>
    <p><?php echo $propiedad['descripcion'] ?></p>
</div>

</main>

<?php incluirTemplate('footer'); ?>
    <script src="src/js/app.js"></script>
</body>

</html>

<?php
mysqli_close($db);
?>
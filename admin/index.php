<?php

require "../includes/templates/funciones.php";
incluirTemplate("header");
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
    <td>1</td>
    <td>Casa en la playa</td>
    <td><img src="/imagenes/c3055419c3a242cb21576351071d1f27jpg" class="imagen-tabla" alt=""></td>
    <td>12000000</td>
    <td>
        <a class="boton-rojo-block" href="#">Eliminar</a>
        <a  class="boton-verde-block" href="#">Actualizar</a>
    </td>
</tr>

        </tbody>


    </table>

   

</main>

<?php
incluirTemplate("footer");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    
</head>

<body>
<?php

require_once 'includes/templates/funciones.php';
incluirTemplate('header');

?>
   
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <img src="src/img/destacada3.jpg" alt="imagen contacto" loading="lazy">
        </picture>
        <h2>Rellene el formulario de Contacto</h2>
        <form action=""class="formulario">
            <fieldset>
                <legend>Información Personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Nombre" id="nombre">
                <label for="email">Email</label>
                <input type="email" placeholder="Nombre" id="email">
                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Nombre" id="telefono">
                <label for="mensaje">Mensaje</label>
                <textarea name="" id="mensaje"></textarea>
            </fieldset>
                <fieldset>
                  <legend>Información sobre la propiedad</legend>      
                <label for="opciones">Venta o Compra</label>
                <select name="" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="venta">Venta</option>
                </select>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" name="" id="presupuesto" min="0">
                </fieldset>
            
            <fieldset>

                <legend>Información sobre la propiedad</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono"id="contactar-telefono">
                    <label for="contactar-email">Email</label>
                    <input  name="contacto" type="radio" value="email"id="contactar-email">

                </div>
                <p>Si eligio teléfono elija la hora para ser contactado</p>
                <label for="fecha">Fecha</label>
                <input type="date" name="" id="fecha">

                <label for="hora">Hora</label>
                <input type="time"  id="hora" min="9:00" max="18:00">


            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">





        </form>
    </main>
    <?php incluirTemplate('footer'); ?>
    <script src="src/js/app.js"></script>
</body>

</html>
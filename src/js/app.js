document.addEventListener("DOMContentLoaded", function() {
    
    evenListeners();
    darkMode();
    
});

function darkMode() {
    // Seleccionamos la imagen con la clase "dark-mode"
    const botonDarkMode = document.querySelector('.dark-mode');

    if (!botonDarkMode) {
        console.error("No se encontró la imagen con la clase 'dark-mode'. Verifica tu HTML.");
        return;
    }

    console.log("Imagen encontrada correctamente.");

    // Agregamos el evento de clic a la imagen
    botonDarkMode.addEventListener('click', function(event) {
        event.stopPropagation(); // Evita que el clic se propague

        // Si el body tiene "dark-mode", lo cambiamos a "dark-mode-boton"
        if (document.body.classList.contains('dark-mode')) {
            document.body.classList.replace('dark-mode', 'dark-mode-boton');
            console.log("Modo oscuro activado.");
        } 
        // Si el body tiene "dark-mode-boton", lo cambiamos de vuelta a "dark-mode"
        else if (document.body.classList.contains('dark-mode-boton')) {
            document.body.classList.replace('dark-mode-boton', 'dark-mode');
            console.log("Modo oscuro desactivado.");
        } 
        // Si el body no tiene ninguna de las dos clases, le añadimos "dark-mode"
        else {
            document.body.classList.add('dark-mode');
            console.log("Modo oscuro añadido por primera vez.");
        }
    });
}




function evenListeners() {
    const menuMobile = document.querySelector(".mobile-menu");
    if (menuMobile) {
        menuMobile.addEventListener("click", navegacionresponsive);
    }
}

function navegacionresponsive() {
    const navegacion = document.querySelector(".navegacion");
    if (navegacion) {
        navegacion.classList.toggle("mostrar");
    }
}

window.onload = function() {
    const mensaje = document.getElementById("mensaje-creacion");

    if (mensaje) {
        setTimeout(function() {
            mensaje.style.display = "none";
        }, 5000);
    }
};

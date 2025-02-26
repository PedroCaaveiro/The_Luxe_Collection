document.addEventListener("DOMContentLoaded", function() {
    
    evenListeners();
    darkMode();
    
});



function darkMode() {
    // 1. Verifica si el sistema prefiere un esquema de colores oscuro
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // 2. Si el sistema prefiere el modo oscuro, aplica la clase "dark-mode" al body
    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    // 3. Si el usuario cambia la preferencia de esquema de color (modo oscuro a claro o viceversa), actualiza el modo en el body
    prefiereDarkMode.addEventListener('change', function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    // 4. Selecciona el botón con la clase "dark-mode"
    const botonDarkMode = document.querySelector('.dark-mode');

   


    // 5. Verifica si el botón existe antes de añadir el listener
    if (botonDarkMode) {
        botonDarkMode.addEventListener('click', function(event) {
            // Previene que el clic se propague al body
            event.stopPropagation();

            // Alterna la clase "dark-mode" en el body para activar/desactivar el modo oscuro
            document.body.classList.toggle('dark-mode');
            
            // Alterna la clase "dark-mode-boton" en el botón
            botonDarkMode.classList.toggle('dark-mode-boton');
        });
    }
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

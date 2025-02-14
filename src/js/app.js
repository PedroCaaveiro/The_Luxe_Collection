document.addEventListener("DOMContentLoaded", function() {
    evenListeners();
    darkMode();
});

function darkMode() {
    const opcionDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

    if (opcionDarkMode.matches) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }

    opcionDarkMode.addEventListener("change", function() {
        if (opcionDarkMode.matches) {
            document.body.classList.add("dark-mode");
        } else {
            document.body.classList.remove("dark-mode");
        }
    });

    // Verifica si el botón de modo oscuro existe
    const botonDarkMode = document.querySelector(".dark-mode");
    if (botonDarkMode) {
        botonDarkMode.addEventListener("click", function() {
            document.body.classList.toggle("dark-mode-boton");
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

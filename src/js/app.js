document.addEventListener("DOMContentLoaded",function(){

    evenListeners();
    darkMode();

});


function darkMode(){

    const opcionDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

    if (opcionDarkMode) {
        document.body.classList.add("dark-mode");
    }else{
        document.body.classList.remove("dark-mode");
    }

    opcionDarkMode.addEventListener("change",function(){

        if (opcionDarkMode.matches) {
            document.body.classList.add("dark-mode");
        }else{
            document.body.classList.remove("dark-mode");
        }
    })

    const botonDarkMode = document.querySelector(".dark-mode");
    botonDarkMode.addEventListener("click",function(){
        document.body.classList.toggle("dark-mode-boton");

    });
}

function evenListeners(){
const  menuMobile = document.querySelector(".mobile-menu");

menuMobile.addEventListener("click",navegacionresponsive);

}

function navegacionresponsive(){

const navegacion = document.querySelector(".navegacion");
navegacion.classList.toggle("mostrar");
    

}


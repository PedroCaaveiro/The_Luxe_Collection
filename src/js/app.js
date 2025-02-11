document.addEventListener("DOMContentLoaded",function(){

    evenListeners();
    darkMode();

});


function darkMode(){

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


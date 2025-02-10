document.addEventListener("DOMContentLoaded",function(){

    evenListeners();

});

function evenListeners(){
const  menuMobile = document.querySelector(".mobile-menu");

menuMobile.addEventListener("click",navegacionresponsive);

}

function navegacionresponsive(){

const navegacion = document.querySelector(".navegacion");
navegacion.classList.toggle("mostrar");
    

}
<?php


require_once 'app.php';

function incluirTemplate($nombre) {
   
    include TEMPLATES_URL . "/$nombre.php"; 
}

?>

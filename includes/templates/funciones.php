<?php


require_once 'app.php';

function incluirTemplate( string $nombre, bool $inicio = false) {
   
    include TEMPLATES_URL . "/$nombre.php"; 
}

?>

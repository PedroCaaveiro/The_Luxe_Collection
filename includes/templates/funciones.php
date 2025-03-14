<?php


require_once __DIR__ . '/app.php';


function incluirTemplate(string $nombre, bool $inicio = false) { 
    include __DIR__ . "/$nombre.php";
}


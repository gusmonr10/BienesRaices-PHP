<?php 
require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false) {
    include template_url . "/$nombre.php";
}

function autenticacion() : bool {
    session_start();
    $auth = $_SESSION["login"];
    
    if($auth) {
        return true;
    }

    return false;
}
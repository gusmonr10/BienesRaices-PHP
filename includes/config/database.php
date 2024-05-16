<?php

function conectarBD() : mysqli {
    // Credenciales para poderse conectar a la BD
    $conexion = mysqli_connect('', '', '', '');

    if(!$conexion) {
        echo "Hubo un error";
        exit;
    }

    return $conexion;
}
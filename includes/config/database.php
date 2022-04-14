<?php

function conectarDB(): mysqli{
    $db = new mysqli('localhost', 'root', 'root', 'asignarsas');
    mysqli_set_charset($db, 'utf8mb4');

    if(!$db){
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;
}
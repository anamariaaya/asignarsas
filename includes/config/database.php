<?php

function conectarDB(): mysqli{
    $db = new mysqli($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PASS"], $_ENV["DB_BD"]);

    mysqli_set_charset($db, 'utf8');


    if(!$db){
        echo "Error, no se pudo conectar";
        echo "errno de deuparación: ". mysqli_connect_errno();
        echo "error de depuración: ". mysqli_connect_error();
        exit;
    }

    return $db;
}
<?php

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/images/');
define('CARPETA_DOCS', $_SERVER['DOCUMENT_ROOT'].'/docs/');



function debugging($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa/Sanitiza el HTML
function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;
}


function redireccionar(string $url){
    $id = $_GET['id'];
    //Validar la URL por ID válido
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location:${url}");
    }

    return $id;
}

function truncate($text, $chars = 50) {
    $text = $text." ";
    $text = substr($text,0,$chars);
    $text = substr($text,0,strrpos($text,' '));
    $text = $text."..."; // Si no se desea tener tres puntos suspensivos se comenta esta línea.
    return $text;
}

function pagina_actual($path){
    if(str_contains($_SERVER['REQUEST_URI'], $path) === true){
        echo 'active';
    } else{
        return;
    }
}

function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

function isAdmin() : void {
    if(!isset($_SESSION['admin'])){
        header('Location: /');
    }
}

function sesionActiva($var){
    if(!isset($_SESSION['admin'])){
        echo '/';
    } else{
        echo '/admin/dashboard';
    }
}
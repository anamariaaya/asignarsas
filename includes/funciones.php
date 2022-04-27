<?php

define('TEMPLATES_URL', __DIR__. '/templates');
define('FUNCIONES_URL', __DIR__. 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/images/');
define('CARPETA_DOCS', $_SERVER['DOCUMENT_ROOT'].'/docs/');



function estaAutenticado(): bool {
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }
    return true;
}

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

//Validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['oferta', 'ciudad', 'usuario'];

    return in_array($tipo, $tipos);
}

//Muestra los mensaje
function mostrarNotificacion($codigo){
    $mensaje = '';

    switch($codigo){
        case 1:
            $mensaje = 'Guardada Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizada Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminada Correctamente';
            break;
        default:
        $mensaje = false;
        break;
    }
    return $mensaje;
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
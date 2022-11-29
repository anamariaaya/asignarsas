<?php

namespace Controllers;

use MVC\Router;
use Model\Candidatos;

class AplicantesController{
    public static function index(Router $router){

        $router->render('/postulacion/index', [
            'subtitulo' => 'Ingresa tus datos para aplicar a la vacante'
        ]);
    }

    public static function postular(Router $router){
        $candidato = new Candidatos($_POST);
        $files = $_FILES['hdv'];
        // debugging($files);
        //Generar un nombre único
        $nombreDoc = md5( uniqid( rand(), true ) ) . ".pdf";
            
        //Asigna la variable al documento
        if($_FILES['hdv']['tmp_name']){
            $documento = $_FILES['hdv']['tmp_name'];
            
            $candidato->setDocumento($nombreDoc);

            if(!is_dir(CARPETA_DOCS)){
                mkdir(CARPETA_DOCS);
            }

            move_uploaded_file($documento, CARPETA_DOCS.$nombreDoc);
        }

        $resultado = $candidato->guardar();

        echo json_encode(['resultado' => $resultado]);
    }
}
<?php

namespace Controllers;

use MVC\Router;
use Model\Usuarios;

class CandidatosController{
    public static function index(Router $router){
        isAdmin();

        $candidatos = Usuarios::whereAll('admin', 0);

        $router->render('/admin/candidatos/index',[
            'titulo' => 'Candidatos',
            'candidatos' => $candidatos
        ]);
    }
}
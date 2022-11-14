<?php

namespace Controllers;

use MVC\Router;

class AplicantesController{
    public static function index(Router $router){
        isAdmin();
        $router->render('portal/candidatos/index', [
            'titulo' => 'Portal de candidato'
        ]);
    }
}
<?php

namespace Controllers;

use MVC\Router;


class PaginasController{
    public static function index(Router $router){
        $inicio = true;
        
        $router->render('paginas/index',[
            'inicio' => $inicio
        ]);
    }

    public static function servicios(Router $router){
        $servicios = true;
        
        $router->render('paginas/servicios',[
            'servicios' => $servicios
        ]);
    }

    public static function nosotros(Router $router){
        $nosotros = true;
        
        $router->render('paginas/nosotros',[
            'nosotros' => $nosotros
        ]);
    }

    public static function contacto(Router $router){
        $contacto = true;
        
        $router->render('paginas/contacto',[
            'contacto' => $contacto
        ]);
    }

    public static function ofertas(Router $router){        
        $router->render('paginas/ofertas');
    }

    public static function soluciones(Router $router){        
        $router->render('paginas/soluciones');
    }
}
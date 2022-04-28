<?php

namespace Controllers;

use MVC\Router;
use Model\Ofertas;
use Model\Ciudades;


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
        $ofertas = true;
        $ciudades = Ciudades::allOrderBy('nombre');    
        
        $router->render('paginas/ofertas', [
            'ofertas' => $ofertas,
            'ciudades' => $ciudades
        ]);
    }

    public static function vacantes(Router $router){
        $id = redireccionar("/ofertas");
        $ofertas = Ofertas::search($id);
        $ciudad = Ciudades::find($id);
        
        $router->render('paginas/vacantes',[
            'ciudad' => $ciudad,
            'ofertas' => $ofertas
        ]);
    }

    public static function vacante(Router $router){
        $id = redireccionar("/ofertas");
        $oferta = Ofertas::find($id);
        $ciudades = Ciudades::all();
        
        $router->render('paginas/vacante',[
            'oferta' => $oferta,
            'ciudades' => $ciudades
        ]);
    }

    public static function soluciones(Router $router){        
        $router->render('paginas/soluciones');
    }
}
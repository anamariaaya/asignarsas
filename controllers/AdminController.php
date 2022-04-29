<?php

namespace Controllers;

use MVC\Router;
use Model\Ciudades;
use Model\Usuarios;
use Model\Ofertas;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController{
    public static function index(Router $router){
        $ofertas = Ofertas::allOrderBy('idCiudad');
        $ciudades = Ciudades::allOrderBy('nombre');
        $usuarios = Usuarios::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('/admin/adminweb', [
            'ofertas' => $ofertas,
            'ciudades' => $ciudades,
            'usuarios' => $usuarios,
            'resultado'=> $resultado
        ]);
    }
}
<?php
namespace Controllers;

use MVC\Router;
use Model\Ciudades;

class CiudadesController{
    public static function index(Router $router){
        isAdmin();

        $ciudadesTotal = Ciudades::whereAll('activa', '1');

        $todos = '';
        $activa = $_GET['strmode'] ?? $todos;
        $palabra = $_GET['strsearch'] ?? $todos;

        $consulta = "SELECT * FROM ciudades WHERE nombre LIKE '${palabra}%'";
        //debugging($consulta);

        if(isset($_GET['strsearch'])){
            $ciudades = Ciudades::consultarSQL($consulta);
        } else{
            $ciudades = Ciudades::whereOrdered('activa', $activa, 'nombre');
        }

        $router->render('admin/ciudades/index', [
            'titulo' => 'Ciudades',
            'subtitulo' => 'Todas las Ciudades',
            'ciudadesTotal' => $ciudadesTotal,
            'ciudades' => $ciudades
        ]);
    }
}
<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;

$router = new Router();

//Páginas públicas
$router->get('/',[PaginasController::class, 'index']);
$router->get('/servicios',[PaginasController::class, 'servicios']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/contacto',[PaginasController::class, 'contacto']);


$router->comprobarRutas();
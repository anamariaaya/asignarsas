<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminController;
use Controllers\OfertasController;
use Controllers\PaginasController;
use Controllers\CiudadesController;

$router = new Router();

//Páginas públicas
$router->get('/',[PaginasController::class, 'index']);
$router->get('/servicios',[PaginasController::class, 'servicios']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/contacto',[PaginasController::class, 'contacto']);
$router->get('/ofertas',[PaginasController::class, 'ofertas']);
$router->get('/soluciones',[PaginasController::class, 'soluciones']);

//Admin Web
$router->get('/adminweb',[AdminController::class, 'index']);

//Admin ofertas
$router->get('/ofertas/crear', [OfertasController::class, 'crear']);
$router->post('/ofertas/crear', [OfertasController::class, 'crear']);
$router->get('/ofertas/actualizar', [OfertasController::class, 'actualizar']);
$router->post('/ofertas/actualizar', [OfertasController::class, 'actualizar']);
$router->post('/ofertas/eliminar', [OfertasController::class, 'eliminar']);

//Admin ciudades
$router->get('/ciudades/crear', [CiudadesController::class, 'crear']);
$router->post('/ciudades/crear', [CiudadesController::class, 'crear']);
$router->get('/ciudades/actualizar', [CiudadesController::class, 'actualizar']);
$router->post('/ciudades/actualizar', [CiudadesController::class, 'actualizar']);
$router->post('/ciudades/eliminar', [CiudadesController::class, 'eliminar']);

//Admin Usuarios



$router->comprobarRutas();
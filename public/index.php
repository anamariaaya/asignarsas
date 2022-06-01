<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ContactosController;
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
$router->post('/contacto',[PaginasController::class, 'contacto']);

$router->get('/ofertas',[PaginasController::class, 'ofertas']);
$router->get('/vacantes',[PaginasController::class, 'vacantes']);
$router->get('/vacante',[PaginasController::class, 'vacante']);
$router->get('/soluciones',[PaginasController::class, 'soluciones']);
$router->post('/soluciones',[PaginasController::class, 'soluciones']);
$router->get('/faq',[PaginasController::class, 'faq']);
$router->get('/politicas',[PaginasController::class, 'politicas']);


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

//Admin mensajes
$router->get('/inbox', [ContactosController::class, 'inbox']);
$router->get('/inbox/mensaje', [ContactosController::class, 'leer']);
$router->post('/inbox/mensaje', [ContactosController::class, 'eliminar']);



$router->comprobarRutas();
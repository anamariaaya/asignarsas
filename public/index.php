<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

use Controllers\APIController;
use Controllers\SQRController;
use Controllers\AuthController;
use Controllers\OfertasController;
use Controllers\PaginasController;
use Controllers\CiudadesController;
use Controllers\UsuariosController;
use Controllers\ContactosController;
use Controllers\DashboardController;
use Controllers\AplicantesController;
use Controllers\CandidatosController;

$router = new Router();

//Páginas públicas
$router->get('/',[PaginasController::class, 'index']);
$router->get('/servicios',[PaginasController::class, 'servicios']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/contacto',[PaginasController::class, 'contacto']);
$router->get('/ofertas',[PaginasController::class, 'ofertas']);
$router->get('/vacantes',[PaginasController::class, 'vacantes']);
$router->get('/vacante',[PaginasController::class, 'vacante']);
$router->get('/soluciones',[PaginasController::class, 'soluciones']);
$router->post('/soluciones',[PaginasController::class, 'soluciones']);
$router->get('/politicas',[PaginasController::class, 'politicas']);
$router->get('/SQR-empleado',[PaginasController::class, 'SQREmpleado']);
$router->get('/prueba', [PaginasController::class, 'prueba']);

//Postulaciones
$router->get('/postulacion', [AplicantesController::class, 'index']);
$router->post('/api/candidatos', [AplicantesController::class, 'postular']);

//SQR
$router->get('/SQR-empresa', [SQRController::class, 'sqrEmpresa']);
$router->post('/SQR-empresa', [SQRController::class, 'sqrEmpresa']);

//API de ofertas
$router->get('/api/ciudades', [APIController::class, 'ciudades']);
$router->get('/api/vacantes', [APIController::class, 'vacantes']);
$router->post('/api/mensaje', [APIController::class, 'mensaje']);

//Admin Web
//*Vista Principal del Dashboard
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

//Admin ofertas
$router->get('/admin/ofertas', [OfertasController::class, 'index']);
$router->get('/admin/ofertas/crear', [OfertasController::class, 'crear']);
$router->post('/admin/ofertas/crear', [OfertasController::class, 'crear']);
$router->get('/admin/ofertas/actualizar', [OfertasController::class, 'actualizar']);
$router->post('/admin/ofertas/actualizar', [OfertasController::class, 'actualizar']);
$router->post('/admin/ofertas/eliminar', [OfertasController::class, 'eliminar']);

//Admin ciudades
$router->get('/admin/ciudades', [CiudadesController::class, 'index']);
$router->post('/api/ciudad', [APIController::class, 'estadoCiudad']);

//Admin Usuarios
$router->get('/admin/usuarios', [UsuariosController::class, 'index']);
$router->get('/admin/usuarios/crear', [UsuariosController::class, 'crear']);
$router->post('/admin/usuarios/crear', [UsuariosController::class, 'crear']);
$router->post('/admin/usuarios/eliminar', [UsuariosController::class, 'eliminar']);


//LogIn y Autenticación
$router->get('/login',[AuthController::class, 'login']);
$router->post('/login',[AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

//Admin mensajes
$router->get('/admin/inbox', [ContactosController::class, 'inbox']);
$router->get('/admin/mensaje', [ContactosController::class, 'leer']);
$router->post('/admin/mensaje', [ContactosController::class, 'eliminar']);
$router->post('/admin/inbox', [ContactosController::class, 'eliminar']);

//Admin aplicantes
$router->get('/admin/candidatos', [CandidatosController::class, 'index']);

$router->comprobarRutas();
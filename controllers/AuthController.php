<?php

namespace Controllers;

use MVC\Router;
use Model\Usuarios;

class AuthController{
    public static function login(Router $router) {
        $alertas = [];


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuarios($_POST);

            $alertas = $usuario->validarLogin();
            
            if(empty($alertas)) {
                // Verificar que el usuario exista
                $usuario = Usuarios::where('email', $usuario->email);

                if(!$usuario ) {
                    Usuarios::setAlerta('error', 'El Usuario No Existe');
                } else {
                    
                    // El Usuario existe
                    if( password_verify($_POST['password'], $usuario->password) ) {
                        
                        // Iniciar la sesión
                        session_start();    
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['apellido'] = $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['admin'] = $usuario->admin ?? null;

                        //Redirección
                        if($usuario->admin){
                            header('Location: /admin/dashboard');
                        } else {
                            header('Location: /portal/candidatos');
                        }
                       
                    } else {
                        Usuarios::setAlerta('error', 'Password Incorrecto');
                    }
                }
            }
        }

        $alertas = Usuarios::getAlertas();
        
        // Render a la vista 
        $router->render('auth/login', [            
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }

    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION = [];
            header('Location: /');
        }       
    }

    public static function registro(Router $router) {
        $alertas = [];
        $usuario = new Usuarios;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            
            $alertas = $usuario->validar_cuenta();

            if(empty($alertas)) {
                $existeUsuario = Usuarios::where('email', $usuario->email);

                if($existeUsuario) {
                    Usuarios::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuarios::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el Token
                    $usuario->crearToken();

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();

                    // Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();
                    

                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        // Render a la vista
        $router->render('auth/registro', [
            'titulo' => 'Crea tu cuenta para aplicar a nuestras vacantes',
            'usuario' => $usuario, 
            'alertas' => $alertas
        ]);
    }
}
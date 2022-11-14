<?php

namespace Controllers;

use Model\Usuarios;
use MVC\Router;

class UsuariosController{
    public static function index(Router $router){
        isAdmin();

        $todos = '';
        $admin = $_GET['struser'] ?? $todos;
        $palabra = $_GET['strsearchus'] ?? $todos;

        $consulta = "SELECT * FROM usuarios WHERE nombre LIKE '${palabra}%' OR email LIKE '${palabra}%' HAVING `admin` = '1' OR `admin` = '2'";
        //debugging($consulta);

        if(isset($_GET['strsearchus'])){
            $usuarios = Usuarios::consultarSQL($consulta);
        } elseif(isset($_GET['struser'])){
            $usuarios = Usuarios::whereAll('admin', $admin);
            $subtitulo = $admin == 1 ? 'Administradores' : 'SuperAdministradores';         
        } else{
            $usuarios = Usuarios::whereAdmin('admin', '1', '2');
        }

        $subtitulo = $subtitulo ?? 'Todos los Usuarios';


        $router->render('/admin/usuarios/index', [
            'titulo' => 'Usuarios del Sistema',
            'subtitulo' => $subtitulo,
            'usuarios' => $usuarios
        ]);
    }

    public static function crear(Router $router){
        isAdmin();
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

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();

                    if($resultado) {
                        header('Location: /admin/usuarios');
                    }
                }
            }
        }
        $router->render('admin/usuarios/crear', [
            'usuario' => $usuario,
            'alertas'=> $alertas
        ]);
    }

    public static function eliminar(){
        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                    $usuario = Usuarios::find($id);
                    $usuario->eliminar();
                    header('Location: /admin/usuarios');                         
            }
        }
    }
}


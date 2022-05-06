<?php
namespace Controllers;

use MVC\Router;
use Model\Contactos;

class ContactosController{
    public static function inbox(Router $router){
        $contactos = Contactos::allOrderDesc('fecha');
        $resultado = $_GET['resultado'] ?? null;

        $router->render('inbox/inbox', [
            'contactos' => $contactos,
            'resultado'=> $resultado
        ]);
    }

    public static function leer(Router $router){
        $id = redireccionar("/inbox");

        $contacto =Contactos::find($id);
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $contacto->mensajeVisto();
        }

        $router->render('inbox/mensaje', [
            'contacto' => $contacto
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    //Compara lo que vamos a eliminar
                    $contacto = Contactos::find($id);
                    $contacto->eliminarMensaje();
                }            
            }
        }
    }
}
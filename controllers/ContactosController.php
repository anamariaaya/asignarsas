<?php
namespace Controllers;

use MVC\Router;
use Model\Contactos;

class ContactosController{
    public static function inbox(Router $router){
        isAdmin();

        $todos = "";
        $estado = $_GET['strstatus'] ?? $todos;
        
        $consulta = "SELECT * FROM contactos";
        if($estado !== $todos){
            $consulta .= " WHERE estado = ${estado}";
        }
        $consulta .= " ORDER BY fecha DESC";

        //debugging($consulta);

        $contactos = Contactos::consultarSQL($consulta);
        $mensajes = Contactos::allOrderBy('fecha', 'DESC');
        

        $resultado = $_GET['resultado'] ?? null;

        if($estado === '1'){
            $subtitulo = 'Leídos';
        } elseif($estado === '0'){
            $subtitulo = 'No Leídos';
        } else{
            $subtitulo = 'Todos los Mensajes';
        }

        $router->render('admin/inbox/inbox', [
            'titulo' => 'Mensajes Recibidos',
            'subtitulo' => $subtitulo,
            'contactos' => $contactos,
            'resultado'=> $resultado,
            'mensajes' => $mensajes
        ]);
    }

    public static function leer(Router $router){
        isAdmin();
        $id = redireccionar("/admin/inbox");

        $contacto =Contactos::find($id);
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $contacto->mensajeVisto();
        }

        $router->render('/admin/inbox/mensaje', [
            'contacto' => $contacto
        ]);
    }

    public static function eliminar(){
        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);           

            if($id){         
                $contacto = Contactos::find($id);       
                $contacto->eliminarMensaje();   
                header('Location: /admin/inbox'); 
            }
        }
    }
}
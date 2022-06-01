<?php

namespace Controllers;

use MVC\Router;
use Model\Ofertas;
use Model\Ciudades;
use Model\Contactos;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{
    public static function index(Router $router){
        $inicio = true;
        $ofertas = Ofertas::get(4);
        $ciudades = Ciudades::all();
        
        $router->render('paginas/index',[
            'inicio' => $inicio,
            'ofertas' => $ofertas,
            'ciudades' => $ciudades,
        ]);
    }

    public static function servicios(Router $router){
        $servicios = true;
        
        $router->render('paginas/servicios',[
            'servicios' => $servicios
        ]);
    }

    public static function nosotros(Router $router){
        $nosotros = true;
        
        $router->render('paginas/nosotros',[
            'nosotros' => $nosotros
        ]);
    }

    public static function contacto(Router $router){
        $mensaje = null;

        $contacto = new Contactos;
        $errores = Contactos::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $contacto = new Contactos($_POST['contacto']);
            $contacto->fecha = date("Y-m-d H:i:s");
            
            $errores = $contacto->validar();

            if(empty($errores)){                
                $contacto->enviarMensaje();
                $mensaje = 'Mensaje enviado';
            }
        }
        
        $router->render('paginas/contacto',[
            'errores' => $errores,
            'contacto' => $contacto,
            'mensaje' => $mensaje
        ]);
    }

    public static function ofertas(Router $router){
        $vacantes = true;
        $ciudades = Ciudades::allOrderBy('nombre');    
        
        $router->render('paginas/ofertas', [
            'vacantes' => $vacantes,
            'ciudades' => $ciudades
        ]);
    }

    public static function vacantes(Router $router){
        $vacantes = true;
        $id = redireccionar("/ofertas");
        $ofertas = Ofertas::search($id);
        $ciudad = Ciudades::find($id);
        
        $router->render('paginas/vacantes',[
            'vacantes' => $vacantes,
            'ciudad' => $ciudad,
            'ofertas' => $ofertas
        ]);
    }

    public static function vacante(Router $router){
        $vacantes = true;
        $id = redireccionar("/ofertas");
        $oferta = Ofertas::find($id);
        $ciudades = Ciudades::all();
        
        $router->render('paginas/vacante',[
            'vacantes' => $vacantes,
            'oferta' => $oferta,
            'ciudades' => $ciudades
        ]);
    }

    public static function soluciones(Router $router){ 
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $respuestas = $_POST['contacto'];

            $mail = new PHPMailer();

            //Configurar SMTP (Protocolo para el envío de Emails)
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true; //Usa autenticación de usuario para envío
            $mail->Username = '15b8d69fe2f467';
            $mail->Password = '8831548112f491';
            $mail->SMTPSecure = 'tls'; //Transport layer security (reemplazó el SSL-Secure Socket Layer)
            $mail->Port = 2525;

            //Configurar el contenido del Email
            $mail->setFrom('gerenciaop@asignar.com.co');//La persona que nos envía el email.
            $mail->addAddress('gerenciaop@asignar.com.co', 'Contacto Comercial'); //La dirección donde se recibirá el email y opcional el nombre.
            $mail->Subject = 'Nuevo Contacto empresarial';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el cuerpo del mensaje
            $contenido = "<html>";
            $contenido .= "<p><b>- NUEVO CONTACTO -</b></p>";
            $contenido .= "<p><b>Empresa: </b>".$respuestas['empresa']."</p>";
            $contenido .= "<p><b>Telefono: </b>".$respuestas['telefono']."</p>";
            $contenido .= "<p><b>NIT: </b>".$respuestas['nit']."</p>";
            $contenido .= "<p><b>Correo: </b>".$respuestas['email']."</p>";
            $contenido .= "<p><b>Nombre Contacto: </b>".$respuestas['nombre']."</p>";
            $contenido .= "<p><b>Cargo: </b>".$respuestas['cargo']."</p>";
            $contenido .= "<p><b>Dirección: </b>".$respuestas['direccion']."</p>";
            $contenido .= "<p><b>Ciudad: </b>".$respuestas['ciudad']."</p>";
            $contenido .= "<p><b>Mensaje: </b>".$respuestas['mensaje']."</p>";

            $mail->Body = $contenido;
                $mail->AltBody = 'Texto alternativo sin HTML';

            //Enviar el Email
            if($mail->send()){
                $mensaje = 'Mensaje enviado correctamente';
            } else{
                $mensaje = "El mensaje no se pudo enviar";
            }
        }

        $router->render('paginas/soluciones', [
            'mensaje' => $mensaje
        ]);
    }

    public static function faq(Router $router){ 
        $router->render('paginas/faq');
    }

    public static function politicas(Router $router){ 
        $router->render('paginas/politicas');
    }
}
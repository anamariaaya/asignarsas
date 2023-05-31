<?php

namespace Controllers;

use Model\SQR;
use MVC\Router;
use Model\Ofertas;
use Model\Ciudades;
use Model\Contactos;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
        $inicio = true;
        
        $router->render('paginas/index',[
            'inicio' => $inicio,
        ]);
    }

    public static function servicios(Router $router){
        $servicios = true;
        
        $router->render('paginas/servicios',[
            'servicios' => $servicios            
        ]);
    }

    public static function brochure(Router $router){
        $router->render('paginas/brochure',[
            'titulo' => 'Nuestro Brochure'
        ]);
    }

    public static function nosotros(Router $router){
        $nosotros = true;
        
        $router->render('paginas/nosotros',[
            'titulo' => '¿Quiénes Somos?',
            'nosotros' => $nosotros
        ]);
    }

    public static function contacto(Router $router){
        
        $router->render('paginas/contacto',[
            'titulo' => 'Contáctenos'
        ]);
    }

    public static function ofertas(Router $router){
        $router->render('paginas/ofertas', [
            'titulo' => 'Ofertas Laborales',
        ]);
    }

    public static function vacantes(Router $router){        
        $router->render('paginas/vacantes',[
            'titulo' => 'Ofertas Laborales en ',
        ]);
    }

    public static function vacante(Router $router){        
        $router->render('paginas/vacante');
    }

    public static function soluciones(Router $router){ 
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $respuestas = $_POST['contacto'];

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['EMAIL_PORT'];
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls'; //Transport layer security (reemplazó el SSL-Secure Socket Layer)

            //Configurar el contenido del Email
            $mail->setFrom('gerenciaop@asignar.com.co');//La persona que nos envía el email.
            $mail->addAddress('gerenciaop@asignar.com.co', 'Contacto Comercial'); //La dirección donde se recibirá el email y opcional el nombre.
            $mail->addAddress('rtangarife@gmail.com', 'Control TIC'); //La dirección donde se recibirá el email y opcional el nombre.
            $mail->Subject = 'Nuevo Contacto empresarial';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el cuerpo del mensaje
            $contenido = "
            <html>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
                    h1 {
                    font-size: 24px;
                    font-weight: 600;
                    line-height: 25px;
                    color: #070056;
                    }

                    body {
                        font-family: 'Poppins', sans-serif;
                        background-color: #ffffff;
                        max-width: 400px;
                        padding: 50px;
                    }
                
                    p {
                        line-height: 18px;
                    }
                    p span {
                        font-size: 12px;
                        color: #333333;
                    }
                    .line::after {
                        content: '';
                        position: absolute;
                        top: 12%;
                        left: 3%;
                        width: 50%;
                        height: 1px;
                        background: #0da6f3;
                        z-index: -1;
                    }
                </style>
                <body>
                    <h1 class='line'>¡Nueva solicitud comercial!</h1>
                    
                    <p>Estos son los datos enviados por el cliente:</p>

                    <p><strong>Empresa: </strong>".$respuestas['empresa']."</p>
                    <p><strong>Teléfono: </strong>".$respuestas['telefono']."</p>
                    <p><strong>NIT: </strong>".$respuestas['nit']."</p>
                    <p><strong>Email de contacto: </strong>".$respuestas['email']."</p>
                    <p><strong>Nombre del contacto: </strong>".$respuestas['nombre']."</p>
                    <p><strong>Cargo: </strong>".$respuestas['cargo']."</p>
                    <p><strong>Dirección: </strong>".$respuestas['direccion']."</p>
                    <p><strong>Ciudad: </strong>".$respuestas['ciudad']."</p>

                    <p>Este es el mensaje de solicitud:</p>
                    <p><strong>Mensaje: </strong>".$respuestas['mensaje']."</p>
                    
                    <p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correos electrónicos entrantes. Por favor no respondas a este mensaje.</span></p>
                </body>
            </html>";

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

    // public static function SQREmpresa(Router $router){
    //     $sqr = new SQR();
    //     $router->render('paginas/SQR-empresa', [
    //         'titulo' => 'SQR Empresas',
    //         'sqr' => $sqr
    //     ]);
    // }

    // public static function SQREmpleado(Router $router){ 
    //     $router->render('paginas/SQR-empleado', [
    //         'titulo' => 'SQR Empleados',
    //     ]);
    // }

    public static function politicas(Router $router){ 
        $router->render('paginas/politicas');
    }
}
<?php

namespace Controllers;

use Model\SQR;
use MVC\Router;
use Classes\Email;

class SQRController{
    public static function sqrEmpresa(Router $router){
        $sqr = new SQR;
        $alertas = SQR::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $sqr = new SQR($_POST);
            //debugging($sqr);
            
            $alertas = $sqr->validar();

            //debugging($alertas);

            if(empty($alertas)){
                $sqr->guardar();
                $email = new Email($sqr->email, $sqr->nombre, 'SQR');
                $email->enviarConfirmacionSQR();

                $alertas = SQR::setAlerta('exito', 'Solicitud Enviada Correctamente');
                $sqr = new SQR;
                $_POST = [];
            }
        }
        
        $alertas = SQR::getAlertas();

        $router->render('paginas/SQR-Empresa', [
            'titulo' => 'SQRs Empresas',
            'alertas' => SQR::getAlertas(),
            'sqr' => $sqr
        ]);
    }
}
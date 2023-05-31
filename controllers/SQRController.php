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
            
            $alertas = $sqr->validar();

            if(empty($alertas)){
                $sqr->guardar();
                $email = new Email($sqr);
                $email->enviarConfirmacionSQR();

                $alertas = SQR::setAlerta('exito', 'Solicitud enviada correctamente');
                $sqr = new SQR;
                $_POST = [];
            }
        }
        
        $alertas = SQR::getAlertas();

        $router->render('paginas/SQR-empresa', [
            'titulo' => 'SQR Empresas',
            'alertas' => SQR::getAlertas(),
            'sqr' => $sqr
        ]);
    }

    public static function sqrEmpleado(Router $router){
        $sqr = new SQR;
        $alertas = SQR::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $sqr = new SQR($_POST);
            
            $alertas = $sqr->validar();

            if(empty($alertas)){
                $sqr->guardar();
                $email = new Email($sqr);
                $email->enviarConfirmacionSQR();

                $alertas = SQR::setAlerta('exito', 'Solicitud enviada correctamente');
                $sqr = new SQR;
                $_POST = [];
            }
        }
        
        $alertas = SQR::getAlertas();

        $router->render('paginas/SQR-empleado', [
            'titulo' => 'SQR Empleados',
            'alertas' => SQR::getAlertas(),
            'sqr' => $sqr
        ]);
    }
}
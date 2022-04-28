<?php
namespace Controllers;

use MVC\Router;

use Model\Ofertas;
use Model\Ciudades;
use Intervention\Image\ImageManagerStatic as Image;

class CiudadesController{
    public static function crear(Router $router){
        $ciudad = new Ciudades;
        $errores = Ciudades::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){            
            /*Crea una nueva Instancia*/
            $ciudad = new Ciudades($_POST['ciudad']);    
            $errores = $ciudad->validar();
    
            if(empty($errores)){
    
                //Guarda en la base de datos
                $ciudad->guardar();
    
            }    
        }

        $router->render('ciudades/crear',[
            'ciudad'=> $ciudad,
            'errores'=> $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = redireccionar("/adminweb");

        $ciudad = Ciudades::find($id);
        $errores = Ciudades::getErrores();

        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Asignar los atributos
            $args = $_POST['ciudad'];
    
            $ciudad->sincronizar($args);
            
            //Validación
            $errores = $ciudad->validar();   
                        
            
            if(empty($errores)){
                //Revisar que el arreglo de errores esté vacío
                $ciudad->guardar();
            }    
        }

        $router->render('/ciudades/actualizar', [
            'ciudad' => $ciudad,
            'errores'=> $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    // $ofertas = Ofertas::search($id);
                    // debugging($ofertas);
                    //Compara lo que vamos a eliminar
                    $ciudad = Ciudades::find($id);
                    $ciudad->eliminar();
                }            
            }
        }
    }
}
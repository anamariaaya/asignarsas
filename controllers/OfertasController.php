<?php
namespace Controllers;

use MVC\Router;
use Model\Ofertas;
use Model\Ciudades;
use Intervention\Image\ImageManagerStatic as Image;

class OfertasController{
    public static function crear(Router $router){
        $oferta = new Ofertas;
        $ciudades = Ciudades::allOrderBy('nombre');
        $errores = Ofertas::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){            
            /*Crea una nueva Instancia*/
            $oferta = new Ofertas($_POST['oferta']);
            
            /* SUBIDA DE ARCHIVOS */
            //Crear carpeta
            $carpetaImagenes = '../../images/';
            
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            
            //Realiza un resize a la imagen con Intervention
            if($_FILES['oferta']['tmp_name']['imagen']){
                $image = Image::make($_FILES['oferta']['tmp_name']['imagen'])->fit(600,600);
                $oferta->setImagen($nombreImagen);
            }
    
            $errores = $oferta->validar();
    
            if(empty($errores)){
    
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
    
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES.$nombreImagen);
    
                //Guarda en la base de datos
                $oferta->guardar();
    
            }    
        }

        $router->render('ofertas/crear',[
            'oferta'=> $oferta,
            'ciudades' => $ciudades,
            'errores'=> $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = redireccionar("/adminweb");

        $oferta = Ofertas::find($id);
        $ciudades = Ciudades::allOrderBy('nombre');
        $errores = Ofertas::getErrores();

        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Asignar los atributos
            $args = $_POST['oferta'];
    
            $oferta->sincronizar($args);
            
            //Validación
            $errores = $oferta->validar();
    
            //Subida de archivos
             //Generar un nombre único
             $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
             //Realiza un resize a la imagen con Intervention
             if($_FILES['oferta']['tmp_name']['imagen']){
                $image = Image::make($_FILES['oferta']['tmp_name']['imagen'])->fit(600,600);
                $oferta->setImagen($nombreImagen);
             }
            
            
            if(empty($errores)){
                //Revisar que el arreglo de errores esté vacío
                if($_FILES['oferta']['tmp_name']['imagen']){
                   
                    $image->save(CARPETA_IMAGENES . $nombreImagen);               
                }            
                //Almacenar la imagen
                $oferta->guardar();
            }    
        }

        $router->render('/ofertas/actualizar', [
            'oferta' => $oferta,
            'ciudades' => $ciudades,
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
                    //Compara lo que vamos a eliminar
                    $oferta = Ofertas::find($id);
                    $oferta->eliminar();
                }            
            }
        }
    }
}
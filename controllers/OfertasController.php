<?php
namespace Controllers;

use MVC\Router;
use Model\Ofertas;
use Model\Ciudades;
use Model\OfertaCiudad;
use Intervention\Image\ImageManagerStatic as Image;

class OfertasController{
    public static function index(Router $router){
        isAdmin();

        $todos = '';
        $idCiudad = $_GET['strcity'] ?? $todos;

        $consulta = "SELECT ofertas.id, ofertas.cargo, ofertas.salario, ofertas.horario, ofertas.descripcion, ofertas.correo, ofertas.idCiudad, ofertas.imagen, ofertas.vencimiento, ofertas.whatsapp, ciudades.nombre as ciudad FROM ofertas LEFT OUTER JOIN ciudades ON ofertas.idCiudad = ciudades.id";
        
        if($idCiudad !== $todos){
            $consulta .= " WHERE ofertas.idCiudad = ${idCiudad}";
        }

        $ofertas = OfertaCiudad::consultarSQL($consulta);
        $lugares = Ciudades::whereAll('activa', '1');
        $subtitulo = Ciudades::where('id', $idCiudad)->nombre ?? 'Todas las ofertas';

        $router->render('admin/ofertas/index', [
            'titulo' => 'Ofertas Laborales',
            'ofertas' => $ofertas,
            'lugares' => $lugares,
            'subtitulo' => $subtitulo
        ]);
    }

    public static function crear(Router $router){
        isAdmin();
        $oferta = new Ofertas;
        $ciudades = Ciudades::whereOrdered('activa', '1', 'nombre');
        $alertas = Ofertas::getAlertas();

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
                $image = Image::make($_FILES['oferta']['tmp_name']['imagen'])->fit(800,600);
                $oferta->setImagen($nombreImagen);
            }
    
            $alertas = $oferta->validar();
    
            if(empty($alertas)){
    
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
    
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES.$nombreImagen);
    
                //Guarda en la base de datos
                $oferta->guardar();
                header ('Location: /admin/ofertas');
            }    
        }

        $router->render('admin/ofertas/crear',[
            'titulo' => 'Crear Oferta',
            'oferta'=> $oferta,
            'ciudades' => $ciudades,
            'alertas'=> $alertas
        ]);
    }

    public static function actualizar(Router $router){
        isAdmin();
        $id = redireccionar("/adminweb");

        $oferta = Ofertas::find($id);
        $ciudades = Ciudades::whereAll('activa', '1');
        $alertas = Ofertas::getAlertas();

        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Asignar los atributos
            $args = $_POST['oferta'];
    
            $oferta->sincronizar($args);
            
            //Validación
            $alertas = $oferta->validar();
    
            //Subida de archivos
             //Generar un nombre único
             $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
             //Realiza un resize a la imagen con Intervention
             if($_FILES['oferta']['tmp_name']['imagen']){
                $image = Image::make($_FILES['oferta']['tmp_name']['imagen'])->fit(600,600);
                $oferta->setImagen($nombreImagen);
             }
            
            
            if(empty($alertas)){
                //Revisar que el arreglo de alertas esté vacío
                if($_FILES['oferta']['tmp_name']['imagen']){
                   
                    $image->save(CARPETA_IMAGENES . $nombreImagen);               
                }            
                //Almacenar la imagen
                $oferta->guardar();
                header ('Location: /admin/ofertas?strcity=' . $oferta->idCiudad);
            }    
        }

        $router->render('/admin/ofertas/actualizar', [
            'titulo' => 'Actualizar Oferta',
            'oferta' => $oferta,
            'ciudades' => $ciudades,
            'alertas'=> $alertas
        ]);
    }

    public static function eliminar(){
        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);            

            if($id){
                    //Compara lo que vamos a eliminar
                    $oferta = Ofertas::find($id);
                    $oferta->eliminar();
                    header ('Location: /admin/ofertas?strcity=' . $oferta->idCiudad);
            }
        }
    }
}
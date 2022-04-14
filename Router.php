<?php

namespace MVC;

class Router{

    public $rutasGET=[];
    public $rutasPOST=[];
    public $rutasProtegidas = ['/admin'];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();

        $auth = $_SESSION['login'] ?? null;
        //Arreglo de rutas protegidas
        $rutasProtegidas = $this->rutasProtegidas;


        $urlActual = $_SERVER['REQUEST_URI'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET'){
            $urlActual = explode('?',$urlActual)[0];
            $fn = $this->rutasGET[$urlActual] ?? null;        
            
        } else{
            $urlActual = explode('?',$urlActual)[0];
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger las rutas
        if(in_array($urlActual, $rutasProtegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            //la URL existe
            call_user_func($fn, $this);
        } else{
            echo 'No existe esta página';
        }
    }

    //Muestra una vista
    public function render($view, $datos = []){
        $rutasProtegidas = $this->rutasProtegidas;

        foreach($datos as $key=>$value){
            $$key = $value;
        }

        ob_start(); //Almacenamiento en memoria temporalmente

        include __DIR__."/views/$view.php";
        $contenido = ob_get_clean(); //Limpia el buffer
        
        
        if(in_array('/'.$view, $rutasProtegidas)){
            include __DIR__."/views/adminlayout.php";
        } else{
            include __DIR__."/views/layout.php";
        }
    }
}
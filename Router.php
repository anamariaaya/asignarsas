<?php

namespace MVC;

class Router{

    public $rutasGET=[];
    public $rutasPOST=[];


    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();

        $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET'){
            $urlActual = explode('?',$urlActual)[0];
            $fn = $this->rutasGET[$urlActual] ?? null;        
            
        } else{
            $urlActual = explode('?',$urlActual)[0];
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }
       
        if($fn){
            //la URL existe
            call_user_func($fn, $this);
        } else{
            //la URL no existe
            //incluir el template 404error.php dentro de layouts/main-layout.php como el contenido
            echo $this->render('/templates/404error');
        }

    }

    //Muestra una vista
    public function render($view, $datos = []){


        foreach($datos as $key=>$value){
            $$key = $value;
        }

        ob_start(); //Almacenamiento en memoria temporalmente

        include __DIR__."/views/$view.php";
        $contenido = ob_get_clean(); //Limpia el buffer

        $url_actual = $_SERVER['PATH_INFO'] ?? '/';
        
        if(str_contains($url_actual, '/admin')) {
            include_once __DIR__ . "/views/layouts/admin-layout.php";
        } else {
            include_once __DIR__ . "/views/layouts/main-layout.php";
        }
    }
}
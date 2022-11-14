<?php

namespace Controllers;

use Model\Ofertas;
use Model\Ciudades;
use Model\Contactos;
use Model\OfertaCiudad;

class APIController{
    public static function ciudades(){
        $ciudades = Ciudades::whereOrdered('activa', '1', 'nombre');
        
        echo json_encode($ciudades);
    }

    public static function vacantes(){

        $consulta = "SELECT ofertas.id, ofertas.cargo, ofertas.salario, ofertas.horario, ofertas.descripcion, ofertas.correo, ofertas.idCiudad, ofertas.imagen, ofertas.vencimiento, ofertas.whatsapp, ciudades.nombre as ciudad FROM ofertas LEFT OUTER JOIN ciudades ON ofertas.idCiudad = ciudades.id";
        
        $ofertas = OfertaCiudad::consultarSQL($consulta);
        
        echo json_encode($ofertas);
    }

    public static function mensaje(){
        //Almacenar el mensaje
        $mensaje = new Contactos($_POST);
        
        $resultado = $mensaje->guardar();
        

        //Enviar el mensaje
        echo json_encode(['resultado' => $resultado]);
    }

    public static function estadociudad(){
        isAdmin();
        $ciudad = Ciudades::find($_POST['id']);
        $args = $_POST;
    
        $ciudad->sincronizar($args);

        $resultado = $ciudad->guardar();

        echo json_encode(['resultado' => $resultado]);
    }
}
<?php

namespace Model;

class Ciudades extends ActiveRecord{
    protected static $tabla = 'ciudades';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[] = 'Añade una ciudad';
        }
        
        return self::$errores;
    }
}


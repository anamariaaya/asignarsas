<?php

namespace Model;

class Ciudades extends ActiveRecord{
    protected static $tabla = 'ciudades';
    protected static $columnasDB = ['id', 'nombre', 'activa'];

    public $id;
    public $nombre;
    public $activa;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->activa = $args['activa'] ?? '';
    }
}


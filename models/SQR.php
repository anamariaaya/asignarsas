<?php

namespace Model;

class SQR extends ActiveRecord{
    protected static $tabla = 'pqrs';
    protected static $columnasDB = ['id', 'fecha_rep', 'tipo', 'nombre', 'apellido', 'doc_tipo', 'doc_otro', 'doc_id', 'email', 'tel', 'direccion', 'lugar_hechos', 'motivo', 'solicitud', 'tipo_usuario'];

    public $id;
    public $fecha_rep;
    public $tipo;
    public $nombre;
    public $apellido;
    public $doc_tipo;
    public $doc_otro;
    public $doc_id;
    public $email;
    public $tel;
    public $direccion;
    public $lugar_hechos;
    public $motivo;
    public $solicitud;
    public $tipo_usuario;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->fecha_rep = $args['fecha_rep'] ?? date('Y-m-d');
        $this->tipo = $args['tipo'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->doc_tipo = $args['doc_tipo'] ?? '';
        $this->doc_otro = $args['doc_otro'] ?? '';
        $this->doc_id = $args['doc_id'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->tel = $args['tel'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->lugar_hechos = $args['lugar_hechos'] ?? '';
        $this->motivo = $args['motivo'] ?? '';
        $this->solicitud = $args['solicitud'] ?? '';
        $this->tipo_usuario = $args['tipo_usuario'] ?? '';
    }

    public function validar(){
        if(!$this->tipo){
            self::$alertas['error'][] = 'El tipo de SQR es obligatorio';
        }
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if(!$this->doc_tipo){
            self::$alertas['error'][] = 'El tipo de documento es obligatorio';
        }
        if(!$this->doc_id){
            self::$alertas['error'][] = 'El documento es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->tel){
            self::$alertas['error'][] = 'El teléfono es obligatorio';
        }
        if(!$this->direccion){
            self::$alertas['error'][] = 'La dirección es obligatoria';
        }
        if(!$this->lugar_hechos){
            self::$alertas['error'][] = 'El lugar de los hechos es obligatorio';
        }
        if(!$this->motivo){
            self::$alertas['error'][] = 'El motivo es obligatorio';
        }
        if(!$this->solicitud){
            self::$alertas['error'][] = 'La solicitud es obligatoria';
        }

        return self::$alertas;
    }
}


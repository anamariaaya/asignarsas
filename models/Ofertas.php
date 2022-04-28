<?php

namespace Model;

class Ofertas extends ActiveRecord{
    protected static $tabla = 'ofertas';
    protected static $columnasDB = ['id', 'cargo', 'salario', 'horario', 'descripcion', 'correo', 'idCiudad', 'imagen', 'vencimiento', 'whatsapp'];

    public $id;
    public $cargo;
    public $salario;
    public $horario;
    public $descripcion;
    public $correo;
    public $idCiudad;
    public $imagen;
    public $vencimiento;
    public $whatsapp;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->cargo = $args['cargo'] ?? '';
        $this->salario = $args['salario'] ?? '';
        $this->horario = $args['horario'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->idCiudad = $args['idCiudad'] ?? 1;
        $this->imagen = $args['imagen'] ?? '';
        $this->vencimiento = $args['vencimiento'] ?? '';
        $this->whatsapp = $args['whatsapp'] ?? '';
    }

    public function validar(){
        if(!$this->cargo){
            self::$errores[] = 'Añade un Cargo';
        }

        if(!$this->salario){
            self::$errores[] = 'Añade el salario del cargo';
        }

        if(!$this->horario){
            self::$errores[] = 'Añade el horario del cargo';
        }

        if(strlen($this->descripcion) < 25 && strlen($this->descripcion) > 300){
            self::$errores[] = 'Añade una descripción entre 40 y 300 caracteres';
        }

        if(!$this->correo){
            self::$errores[] = 'Añade un correo donde se reciben las hojas de vida';
        }

        if(!$this->idCiudad){
            self::$errores[] = 'Elige una ciudad';
        }

        if(!$this->imagen){
            self::$errores[] = 'La imagen es obligatoria';
        }

        if(!$this->vencimiento){
            self::$errores[] = 'Añade la fecha de vencimiento de la oferta';
        }

        return self::$errores;
    }
}
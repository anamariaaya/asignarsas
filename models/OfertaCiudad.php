<?php

namespace Model;

class OfertaCiudad extends ActiveRecord{
    protected static $tabla = 'oferta_ciudad';
    protected static $columnasDB = ['id', 'cargo', 'salario', 'horario', 'descripcion', 'correo', 'idCiudad', 'imagen', 'vencimiento', 'whatsapp', 'ciudad'];

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
    public $ciudad;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->cargo = $args['cargo'] ?? '';
        $this->salario = $args['salario'] ?? '';
        $this->horario = $args['horario'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->idCiudad = $args['idCiudad'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->vencimiento = $args['vencimiento'] ?? '';
        $this->whatsapp = $args['whatsapp'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
    }
}
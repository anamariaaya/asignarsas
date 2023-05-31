<?php

namespace Model;

class Contactos extends ActiveRecord{
    protected static $tabla = 'contactos';
    protected static $columnasDB = ['id', 'nombres', 'apellidos', 'ciudad', 'correo', 'celular', 'mensaje', 'estado', 'fecha'];

    public $id;
    public $nombres;
    public $apellidos;
    public $ciudad;
    public $correo;
    public $celular;
    public $mensaje;
    public $estado;
    public $fecha;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombres = $args['nombres'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->celular = $args['celular'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
        $this->estado = $args['estado'] ?? 0;
        $this->fecha = $args['fecha'] ?? '';
    }

    public function validar(){
        if(!$this->nombres){
            self::$alertas['error'][] = 'Añade un nombre';
        }
        if(!$this->apellidos){
            self::$alertas['error'][] = 'Añade un apellido';

        }if(!$this->ciudad){
            self::$alertas['error'][] = 'Añade una ciudad';

        }if(!$this->correo){
            self::$alertas['error'][] = 'Añade un correo';

        }if(!$this->celular){
            self::$alertas['error'][] = 'Añade un número de celular';

        }if(!$this->mensaje){
            self::$alertas['error'][] = 'Añade un mensaje';
        }
        
        return self::$alertas;
    }

    public function mensajeVisto(){

        $query = "UPDATE ".  self::$tabla. " SET estado=1 WHERE id=".$this->id."";

        $resultado = self::$db->query($query);

        // if($resultado){
        //    header('Location: /contacto');
        // }
    }
}


<?php

namespace Model;

class Usuarios extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'correo', 'password', 'nivel'];

    public $id;
    public $nombre;
    public $apellido;
    public $correo;
    public $password;
    public $nivel;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->nivel = $args['nivel'] ?? '';
    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[] = 'El nombre es obligatorio';
        }

        if(!$this->apellido){
            self::$errores[] = 'El apellido es obligatorio';
        }

        if(!$this->correo){
            self::$errores[] = 'El correo es obligatorio';
        }

        if(!$this->password){
            self::$errores[] = 'El password es obligatorio';
        }

        return self::$errores;
    }

    public function existeUsuario(){
        //Revisar si un usuario existe o no
        $query = "SELECT * FROM ". self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$errores[] = 'El usuario ya existe';
            return;
        }
        return $resultado;
    }
}
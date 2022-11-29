<?php

namespace Model;

class Candidatos extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'candidatos';
    protected static $columnasDB = ['id', 'identificacion', 'nombre', 'apellido', 'edad', 'telefono', 'email', 'ciudad', 'hdv', 'idOferta', 'fechaRec'];

    public $id;
    public $identificacion;
    public $nombre; 
    public $apellido;
    public $edad;
    public $telefono;
    public $email;
    public $ciudad;
    public $hdv;
    public $idOferta;
    public $fechaRec;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->identificacion = $args['identificacion'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->edad = $args['edad'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->hdv = $args['hdv'] ?? '';
        $this->idOferta = $args['idOferta'] ?? '';
        $this->fechaRec = date('Y-m-d H:i:s');
    }

    // Validar el Login de Usuarios
    public function validar() {
        if(!$this->identificacion) {
            self::$alertas['error'][] = 'El número de identificación es obligatorio';
        }
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if(!$this->edad) {
            self::$alertas['error'][] = 'La edad es obligatoria';
        }
        if(!$this->telefono) {
            self::$alertas['error'][] = 'El teléfono es obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        if(!$this->ciudad) {
            self::$alertas['error'][] = 'La ciudad es obligatoria';
        }
        if(!$this->hdv) {
            self::$alertas['error'][] = 'Debes adjuntar la hoja de vida';
        }

        return self::$alertas;
    }

    public function existeCandidato(){
        //Revisar si un usuario existe o no
        $query = "SELECT * FROM ". self::$tabla . " WHERE identificacion = '" . $this->identificacion . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][] = 'Ya te postulaste para una oferta. Pronto te contactaremos';
            return;
        }
        return $resultado;
    }
}
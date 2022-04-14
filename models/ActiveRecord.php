<?php

namespace Model;

class ActiveRecord{
     //Base de Datos
     protected static $db;
     protected static $columnasDB = [];
     protected static $tabla = '';
 
     //Errores - Validación
     protected static $errores = [];
     
    
     //Definir la conexión a la BD
     public static function setDB($database){
         self::$db = $database;
     }
     
     public function guardar(){
         if(!is_null($this->id)){
             $this->actualizar();
         } else{
             $this->crear();
         }
     }
 
     public function crear(){
         $atributos = $this->sanitizarAtributos();
 
         // $string = join(', ',array_values($atributos));
         // debugging($string);
 
         $query = "INSERT INTO ".  static::$tabla. "(";
         $query.= join(', ',array_keys($atributos));
         $query.= ") VALUES('";
         $query.= join("', '", array_values($atributos));
         $query.= "')";

         $resultado = self::$db->query($query);
 
         if($resultado){
            header('Location: /admin?resultado=1');
         }
     }
 
     public function actualizar(){
         $atributos = $this->sanitizarAtributos();
    
         $valores=[];
         foreach($atributos as $key=>$value){
             $valores[] = "{$key}='{$value}'";
         }
         $query= "UPDATE ". static::$tabla. " SET ";
         $query.= (join(', ',$valores));
         $query.= " WHERE id = '".self::$db->escape_string($this->id)."' ";
         $query.= " LIMIT 1";
 
         
          $resultado = self::$db->query($query);
          if($resultado) {                
             header('Location: /admin?resultado=2');
         }
     }
 
     //Eliminar un registro
     public function eliminar(){        
         $query = "DELETE FROM ". static::$tabla ." WHERE id =".self::$db->escape_string($this->id)." LIMIT 1" ;

         $resultado = self::$db->query($query);
 
         if($resultado){
             $this->borrarImagen();
             header('location: /admin?resultado=3');
         }
     }

     public function eliminarDoc(){        
        $query = "DELETE FROM ". static::$tabla ." WHERE id =".self::$db->escape_string($this->id)." LIMIT 1" ;

        $resultado = self::$db->query($query);

        if($resultado){
            $this->borrarDocumento();
            header('location: /admin?resultado=3');
        }
    }
 
     public function atributos(){
         $atributos = [];
         foreach(static::$columnasDB as $columna){
             if($columna === 'id') continue;
             $atributos[$columna] = $this->$columna;
         }
         return $atributos;
     }
 
     public function sanitizarAtributos(){
         $atributos = $this->atributos();
         $sanitizado = [];         
 
         foreach($atributos as $key => $value){
             $sanitizado[$key] = self::$db->escape_string($value);
         }
         
         return $sanitizado;
     }
 
     // Subida de archivos
     public function setImagen($imagen){
         //Elimina la imagen previa
         if(!is_null($this->id)){
             $this->borrarImagen();            
         }
         //Asignar el nombre de la imagen al atributo
         if($imagen){
             $this->imagen = $imagen;
         }
     }

     public function setDocumento($documento){
        //Elimina el documento previo
        if(!is_null($this->id)){
            $this->borrarDocumento();            
        }
        //Asignar el nombre del documento al atributo
        if($documento){
            $this->documento = $documento;
        }
    }
 
     //Eliminar el archivo
     public function borrarImagen(){
         $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
             if($existeArchivo){
                 unlink(CARPETA_IMAGENES . $this->imagen);
             } 
     }

     //Eliminar el archivo
     public function borrarDocumento(){
        $existeDoc = file_exists(CARPETA_DOCS . $this->documento);
        if($existeDoc){
            unlink(CARPETA_DOCS . $this->documento);
        } 
    }
 
     //Validación
     public static function getErrores(){
         return static::$errores;
     }
 
     public function validar(){
        static::$errores = [];
        return static::$errores;
     }
 
     //Lista todos los registros
     public static function all(){
         $query = "SELECT * FROM " . static::$tabla;
         
         $resultado = self::consultarSQL($query);
 
         return $resultado;
     }

     //Obtiene determinado número de registros
     public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla. " LIMIT ". $cantidad;
        
        $resultado = self::consultarSQL($query);

        return $resultado;
    }
 
     //Busca un registro por su ID
     public static function find($id){
         $query = "SELECT * FROM ". static::$tabla .  " WHERE id = ${id}";
         $resultado = self::consultarSQL($query);
 
         return array_shift($resultado);
     }

     //Busca un registro por su categoría
     public static function search($catId){    
        $query = "SELECT * FROM ". static::$tabla . " WHERE catId = ${catId}";

        $resultado = self::consultarSQL($query);
        

        return $resultado;
    }
 
     public static function consultarSQL($query){
         //Consultar la base de datos
         $resultado = self::$db->query($query);
 
         //Iterar los Resultados
         $array = [];
         while($registro = $resultado->fetch_assoc()){
             $array[] = static::crearObjeto($registro);
         }
 
         //Liberar la memoria
         $resultado->free();
 
         //Retornar los resultados
         return $array;
     }
 
     protected static function crearObjeto($registro){
         $objeto = new static;
 
         foreach ($registro as $key=>$value){
             if(property_exists($objeto, $key)){
                 $objeto->$key = $value;
             }
         }
         return $objeto;
     }
     //Sincroniza el objeto en memoria con los cambios realizados por el usuario
     public function sincronizar($args = []){
         foreach($args as $key=>$value){
             if(property_exists($this, $key) && !is_null($value)){
                 $this->$key = $value;
             }
         }
     }
}
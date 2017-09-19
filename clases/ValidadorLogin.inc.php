<?php

include_once 'RepositorioUsuario.inc.php';
class ValidadorLogin{
    
    private $tipo_usuario;
    private $usuario;
    private $pssword;
    private $error;
    
    public function __construct($tipo_usuario, $usuario, $clave, $conexion){
        $this -> tipo_usuario="";
        $this -> usuario="";
        $this -> password="";
        $this -> error="";
        if (!$this -> variable_iniciada($tipo_usuario) || !$this -> variable_iniciada($usuario) || !$this -> variable_iniciada($clave)) {
            $this -> usuario=null;
            $this -> error = "Debe introducir tu usuario y contraceña";
        }
        else{
            $this -> usuario = RepositorioUsuario :: obtener_usuario ($conexion, $usuario);
            if (is_null($this -> usuario) || !password_verify($clave, $this -> usuario -> obtener_password())) {
                $this -> error="Datos incorrecto";
            }
            
        }
    }
    private function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }   
    }
    
    public function obtener_tipo_usuario(){
        return $this -> tipo_usuario;
    }
    
    public function obtener_usuario(){
        return $this -> usuario;
    }
    
    public function obtener_password(){
        return $this -> password;
    }
    public function obtener_error(){
        return $this -> error;
    }
    public function mostrar_error(){
        if ($this -> error !=='') {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this -> error;
            echo "</div><br>";
        }
    } 
}
?>
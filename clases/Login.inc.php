<?php

    class Login{
        
       
        private $tipo_usuario;
        private $usuario;
        private $password;
        
        public function __construct($tipo_usuario, $usuario, $password){
            
            $this -> tipo_usuario = $tipo_usuario;
            $this -> usuario = $usuario;
            $this -> password = $password;
        }
        
        public function obtener_cod_usuario(){
            return $this -> cod_usuario;
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
        
        
        
        public function cambiar_tipo_usuario($tipo_usuario){
            $this -> tipo_usuario = $tipo_usuario;
        }
        
        public function cambiar_usuario($usuario){
            $this -> usuario = $usuario;
        }
        
        public function cambiar_password($password){
            $this -> password = $password;
        }
    }
?>
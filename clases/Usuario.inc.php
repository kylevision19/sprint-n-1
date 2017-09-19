<?php

    class Usuario {
        
        private $codigo;
        private $cedula;
        private $nombre1;
        private $nombre2;
        private $apellido1;
        private $apellido2;
        private $correo;
        private $telefono;
        private $cod_usuario;
        
        public function __construct($codigo, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $correo, $telefono, $cod_usuario){
            $this -> codigo = $codigo;
            $this -> cedula = $cedula;
            $this -> nombre1 = $nombre1;
            $this -> nombre2 = $nombre2;
            $this -> apellido1 = $apellido1;
            $this -> apellido2 = $apellido2;
            $this -> correo = $correo;
            $this -> telefono = $telefono;
            $this -> cod_usuario = $cod_usuario;
        }
        public function obtener_codigo(){
            return $this -> codigo;
        }
        public function obtener_cedula(){
            return $this -> cedula;
        }
        public function obtener_nombre1(){
            return $this -> nombre1;
        }
        public function obtener_nombre2(){
            return $this -> nombre2;
        }
        public function obtener_apellido1(){
            return $this -> apellido1;
        }
        public function obtener_apellido2(){
            return $this -> apellido2;
        }
        public function obtener_correo(){
            return $this -> correo;
        }
        public function obtener_telefono(){
            return $this -> telefono;
        }
        public function obtener_cod_usuario(){
            return $this -> cod_usuario;
        }
        public function cambiar_cedula(){
            return $this -> cedula;
        }
        public function cambiar_nombre1(){
            return $this -> nombre1;
        }
        public function cambiar_nombre2(){
            return $this -> nombre2;
        }
        public function cambiar_apellido1(){
            return $this -> apellido1;
        }
        public function cambiar_apellido2(){
            return $this -> apellido2;
        }
        public function cambiar_correo(){
            return $this -> correo;
        }
        public function cambiar_telefono(){
            return $this -> telefono;
        }
        public function cambiar_cod_usuario(){
            return $this -> cod_usuario;
        }
    }
?>

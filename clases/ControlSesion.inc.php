<?php

class ControlSesion{
    
    public static function iniciar_sesion($tipo_usuario, $nombre_usuario){
        if (session_id()=='') {
            session_start();
        }
        $_SESSION['tipo_usuario']=$tipo_usuario;
        $_SESSION['nombre_usuario']=$nombre_usuario;
    }
    
    public static function cerrar_sesion(){
        if (session_id()=='') {
            session_start();
        }
        if (isset($_SESSION['tipo_usuario'])) {
            unset($_SESSION['tipo_usuario']);
        }
        if (isset($_SESSION['nombre_usuario'])) {
            unset($_SESSION['nombre_usuario']);
        }
        session_destroy();
    }
    
    public static function sesion_iniciada(){
        if (session_id()=='') {
            session_start();
        }
        if (isset($_SESSION['tipo_usuario']) && isset($_SESSION['nombre_usuario'])) {
            return true;
        }
        else{
            return false;
        }
    }
}
?>
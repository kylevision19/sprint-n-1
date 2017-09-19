<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorRegistro{
    
    private $aviso_inicio;
    private $aviso_cierre;
    
    private $cedula;
    private $nombre1;
    private $nombre2;
    private $apellido1;
    private $apellido2;
    private $correo;
    private $telefono;
    private $cod_usuario;


    private $error_cedula;
    private $error_nombre1;
    private $error_nombre2;
    private $error_apellido1;
    private $error_apellido2;
    private $error_correo;
    private $error_telefono;
    private $error_cod_usuario;
     
    public function __construct($cedula, $nombre1, $nombre2, $apellido1, $apellido2, $correo, $telefono, $cod_usuario, $conexion){
        
        $this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this -> aviso_cierre = "</div>";
        
        $this -> cedula = "";
        $this -> nombre1 = "";
        $this -> nombre2 = "";
        $this -> apellido1 = "";
        $this -> apellido2 = "";
        $this -> correo = "";
        $this -> telefono = "";
        $this -> cod_usuario = "";
        
        $this -> error_cedula = $this -> validar_cedula($conexion, $cedula);
        $this -> error_nombre1 = $this -> validar_nombre1($conexion, $nombre1);
        $this -> error_nombre2 = $this -> validar_nombre2($conexion, $nombre2);
        $this -> error_apellido1 = $this -> validar_apellido1($conexion, $apellido1);
        $this -> error_apellido2 = $this -> validar_apellido2($conexion, $apellido2);
        $this -> error_correo = $this -> validar_correo($conexion, $correo);
        $this -> error_telefono = $this -> validar_telefono($conexion, $telefono);
        $this -> error_cod_usuario = $this -> validar_cod_usuario($conexion, $cod_usuario);
        
        
    }
    
    private function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }   
    }
    
    private function validar_cedula($conexion, $cedula){
        if (!$this -> variable_iniciada($cedula)) {
            return "Debe escribir un nombre de usuario. ";
        }else{
            $this -> cedula = $cedula;
        }
        if (strlen($cedula) < 10) {
            return "La cedula debe contener 10 caracteres.";
        }
        if (strlen($cedula) > 10) {
            return "La cedula debe contener 10 caracteres.";
        }
        if (RepositorioUsuario :: cedula_existe($conexion, $cedula)) {
            return "Esta cedula ya existe, Por favor ingresera correctamente";
        }
        return "";
    }
    
    private function validar_nombre1($conexion, $nombre1){
        if (!$this -> variable_iniciada($nombre1)){
            return "Debe proporcionar su primer nombre.";
        }else{
            $this -> nombre1 = $nombre1;
        }
        return "";
    }
    
    private function validar_nombre2($conexion, $nombre2){
        if (!$this -> variable_iniciada($nombre2)){
            $this -> nombre2 = $nombre2;
        }
        return "";
    }
    
    private function validar_apellido1($conexion, $apellido1){
        if (!$this -> variable_iniciada($apellido1)){
            return "Debe proporcionar su primer apellido.";
        }else{
            $this -> apellido1 = $apellido1;
        }
        return "";
    }
    
    private function validar_apellido2($conexion, $apellido2){
        if (!$this -> variable_iniciada($apellido2)){
            return "Debe proporcionar su segundo apellido.";
        }else{
            $this -> apellido2 = $apellido2;
        }
        return "";
    }
    
    private function validar_correo($conexion, $correo){
        if (!$this -> variable_iniciada($correo)){
            return "Debe proporcionar su correo.";
        }else{
            $this -> correo = $correo;
        }
        if (RepositorioUsuario :: correo_existe($conexion, $correo)) {
            return "Esta cedula ya existe, Por favor ingresera correctamente";
        }
        return "";
    }
    
    private function validar_telefono($conexion, $telefono){
        if (!$this -> variable_iniciada($telefono)){
          $this -> telefono = $telefono;
        }
        return "";
    }
    
    private function validar_cod_usuario($conexion, $cod_usuario){
        if (!$this -> variable_iniciada($cod_usuario)){
            return "Debe proporcionar el codigo del vicerrector.";
        }else{
            $this -> cod_usuario = $cod_usuario;
        }
        return "";
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
    
    public function obtener_error_cedula(){
        return $this -> error_cedula;
    }
    
    public function obtener_error_nombre1(){
        return $this -> error_nombre1;
    }
    
    public function obtener_error_nombre2(){
        return $this -> error_nombre2;
    }
    
    public function obtener_error_apellido1(){
        return $this -> error_apellido1;
    }
    
    public function obtener_error_apellido2(){
        return $this -> error_apellido2;
    }
    
    public function obtener_error_correo(){
        return $this -> error_correo;
    }
    
    public function obtener_error_telefono(){
        return $this -> error_telefono;
    }
    
    public function obtener_error_cod_usuario(){
        return $this -> error_cod_usuario;
    }
    
    public function mostrar_cedula(){
        if ($this -> cedula !=="") {
            echo 'value="'. $this -> cedula .'"';
        }
    }
    
    public function mostrar_error_cedula(){
        if ($this -> error_cedula !=="") {
            echo $this -> aviso_inicio . $this -> error_cedula . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_nombre1(){
        if ($this -> nombre1 !=="") {
            echo 'value="'. $this -> nombre1 .'"';
        }
    }
    
    public function mostrar_error_nombre1(){
        if ($this -> error_nombre1 !=="") {
            echo $this -> aviso_inicio . $this -> error_nombre1 . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_nombre2(){
        if ($this -> nombre2 !=="") {
            echo 'value="'. $this -> nombre2 .'"';
        }
    }
    
    public function mostrar_error_nombre2(){
        if ($this -> error_nombre2 !=="") {
            echo $this -> aviso_inicio . $this -> error_nombre2 . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_apellido1(){
        if ($this -> apellido1 !=="") {
            echo 'value="'. $this -> apellido1 .'"';
        }
    }
    
    public function mostrar_error_apellido1(){
        if ($this -> error_apellido1 !=="") {
            echo $this -> aviso_inicio . $this -> error_apellido1 . $this -> aviso_cierre;
        }
    }
    
   public function mostrar_apellido2(){
        if ($this -> apellido2 !=="") {
            echo 'value="'. $this -> apellido2 .'"';
        }
    }
    
    public function mostrar_error_apellido2(){
        if ($this -> error_apellido2 !=="") {
            echo $this -> aviso_inicio . $this -> error_apellido2 . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_correo(){
        if ($this -> correo !=="") {
            echo 'value="'. $this -> correo .'"';
        }
    }
    
    public function mostrar_error_correo(){
        if ($this -> error_correo !=="") {
            echo $this -> aviso_inicio . $this -> error_correo . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_telefono(){
        if ($this -> telefono !=="") {
            echo 'value="'. $this -> telefono .'"';
        }
    }
    
    public function mostrar_error_telefono(){
        if ($this -> error_telefono !=="") {
            echo $this -> aviso_inicio . $this -> error_telefono . $this -> aviso_cierre;
        }
    }
    
     public function mostrar_cod_usuario(){
        if ($this -> cod_suario !=="") {
              echo 'value="'. $this -> cod_usuario .'"';
        }
    }
    
    public function mostrar_error_cod_usuario(){
        if ($this -> error_cod_usuario !=="") {
            echo $this -> aviso_inicio . $this -> error_cod_usuario . $this -> aviso_cierre;
        }
    }
    
    public function registro_valido(){
        if ($this -> error_cedula === "" && $this -> error_nombre1 === "" && $this -> error_nombre2 === "" && $this -> error_apellido1 === "" &&
                $this -> error_apellido2 === "" && $this -> error_correo === "" && $this -> error_telefono === "" && $this -> error_cod_usuario ===""){
            return true;
        }else{
            return false;
        }
    }
}
?>

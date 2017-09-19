<?php

class RepositorioUsuario{
    
    public static function obtener_numero_usuarioL($conexion) {
        $total_usuarios = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM login";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $total_usuarios = $resultado['total'];
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $total_usuarios;
    }
    
    public static function tipo_usuario_existe($conexion, $tipo_usuario){
        $tipo_usuario_existe = true;
        if (isset($conexion)) {
            try {
                $sql="SELECT * FROM login WHERE tipo_usuario = :tipo_usuario";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':tipo_usuario', $tipo_usuario, PDO :: PARAM_STR);
                
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)) {
                    $tipo_usuario_existe = true;
                }else{
                    $tipo_usuario_existe= false;
                }
            } catch (PDOException $err) {
                print 'ERROR' .$err -> getMessage();
            }
        }
        return $tipo_usuario_existe;
    }
    public static function usuario_existe($conexion, $usuario){
        $usuario_existe = true;
        if (isset($conexion)) {
            try {
                $sql="SELECT * FROM login WHERE usuario = :usuario";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':usuario', $usuario, PDO :: PARAM_STR);
                
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)) {
                    $usuario_existe = true;
                }else{
                    $usuario_existe= false;
                }
            } catch (PDOException $err) {
                print 'ERROR' .$err -> getMessage();
            }
        }
        return $usuario_existe;
    }
    
    public static function obtener_usuario($conexion, $usuario){
        $usuarios=null;
        if (isset($conexion)) {
            try {
                include_once 'Login.inc.php';
                $sql="SELECT * FROM login WHERE usuario = :usuario";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':usuario',$usuario,PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                if (!empty($resultado)) {
                    $usuarios = new Login($resultado['tipo_usuario'], $resultado['usuario'], $resultado['password']);
                }
            } 
            catch (PDOException $err) {
                print 'ERROR' .$err -> getMessage();
            }
        }
        return $usuarios;
    }
    public static function insertar_coordinador($conexion, $usuario){
        $coordinador_insertado=false;
        
        if (isset($conexion)) {
            try {
                $sql="INSERT INTO coordinador(cedula, nombre1, nombre2, apellido1, apellido2, correo, telefono, cod_usuario) VALUES(:cedula, :nombre1, :nombre2, :apellido1, :apellido2, :correo, :telefono, :cod_usuario)";
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':cedula', $usuario -> obtener_cedula(), PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre1', $usuario -> obtener_nombre1(), PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre2', $usuario -> obtener_nombre2(), PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido1', $usuario -> obtener_apellido1(), PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido2', $usuario -> obtener_apellido2(), PDO::PARAM_STR);
                $sentencia -> bindParam(':correo', $usuario -> obtener_correo(), PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono', $usuario -> obtener_telefono(), PDO::PARAM_STR);
                $sentencia -> bindParam(':cod_usuario', $usuario -> obtener_cod_usuario(), PDO::PARAM_INT);
                
                $coordinador_insertado =$sentencia -> execute();
            } catch (PDOException $err) {
                print 'ERROR' .$err -> getMessage();
            }
        }
        return $coordinador_insertado;
    }
    
    public static function insertar_login($conexion, $tipo_usuario, $usuario, $password){
        $login_insertado=false;
        
        if (isset($conexion)) {
            try {
                $sql="INSERT INTO login(tipo_usuario, usuario, password) VALUES(:tipo_usuario, :usuario, :password)";
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':tipo_usuario', $tipo_usuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':usuario', $usuario , PDO::PARAM_STR);
                $sentencia -> bindParam(':password', $password, PDO::PARAM_STR);
                
                $login_insertado =$sentencia -> execute();
            } catch (PDOException $err) {
                print 'ERROR' .$err -> getMessage();
            }
        }
        return $login_insertado;
    }
    
    public static function cedula_existe($conexion, $cedula){
        $cedila_existe = true;
        if (isset($conexion)) {
            try {
                $sql="SELECT * FROM coordinador WHERE cedula = :cedula";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':cedula', $cedula, PDO :: PARAM_STR);
                
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)) {
                    $cedula_existe = true;
                }else{
                    $cedula_existe = false;
                }
            } catch (PDOException $err) {
                print 'ERROR' .$err -> getMessage();
            }
        }
        return $cedula_existe;
    }
    
    public static function correo_existe($conexion, $correo){
        $correo_existe = true;
        if (isset($conexion)) {
            try {
                $sql="SELECT * FROM coordinador WHERE correo = :correo";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':correo', $correo, PDO :: PARAM_STR);
                
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)) {
                    $correo_existe = true;
                }else{
                    $correo_existe = false;
                }
            } catch (PDOException $err) {
                print 'ERROR' .$err -> getMessage();
            }
        }
        return $correo_existe;
    }
}
?>
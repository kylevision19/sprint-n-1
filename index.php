<?php
include_once 'clases/Config.inc.php';
include_once 'clases/Conexion.inc.php';
include_once 'clases/RepositorioUsuario.inc.php';
include_once 'clases/ValidadorLogin.inc.php';
include_once 'clases/ControlSesion.inc.php';
include_once 'clases/Redireccion.inc.php';



if (isset($_POST['login'])) {
    Conexion :: abrir_conexion();
    $validador = new ValidadorLogin($_POST['cbTipo_usuario'], $_POST['usuario'], $_POST['clave'], Conexion :: obtener_conexion());
    if ($validador->obtener_error() === '' && !is_null($validador->obtener_usuario())) {
        session_start();
        
            ControlSesion :: iniciar_sesion($validador->obtener_usuario()->obtener_tipo_usuario(), $validador->obtener_usuario()->obtener_usuario());
            if ($_POST['cbTipo_usuario'] == RepositorioUsuario :: tipo_usuario_existe(Conexion :: obtener_conexion(), $_POST['cbTipo_usuario'])) {
                Redireccion :: redirigir(RUTA_VICERRECTOR);
            } else if ($_POST['cbTipo_usuario'] == RepositorioUsuario :: tipo_usuario_existe(Conexion :: obtener_conexion(), $_POST['cbTipo_usuario'])) {
                Redireccion :: redirigir(RUTA_COORDINADOR);
            } else if ($_POST['cbTipo_usuario'] == RepositorioUsuario :: tipo_usuario_existe(Conexion :: obtener_conexion(), $_POST['cbTipo_usuario'])) {
                Redireccion :: redirigir(RUTA_ESTUDIANTES);
            } else {
                Redireccion :: redirigir(SERVIDOR);
            }
        } else {
            Redireccion :: redirigir(SERVIDOR);
        }
        Conexion :: cerrar_conexion();
    }

    $titulo = 'login';

    include_once 'plantillas/html_inicio.inc.php';
    ?>
    <br>
    <br>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Iniciar Sesi&oacute;n</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="recupera.php">¿Se te olvid&oacute; tu contraseña?</a></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                        <label for="cbTipo_usuario">Tipo usuario</label>
                        <select name="cbTipo_usuario">
                            <option value="Vicerrector">Vicerrector</option>
                            <option value="Coordinador">Coordinador</option>
                            <option value="Estudiantes">Estudiantes</option>
                        </select>
                        <br>
                        <br>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="usuario" type="text" class="form-control" name="usuario"  placeholder="ingrese su usuario" 
                            <?php
                            if (isset($_POST['login']) && isset($_POST['usuario']) && !empty($_POST['usuario'])) {
                                echo 'value="' . $_POST['usuario'] . '"';
                            }
                            ?> 
                                   required autofocus="">                                        
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="clave" type="password" class="form-control" name="clave"  placeholder="contraceña" required>
                            <br>

                        </div>
                        <?php
                        if (isset($_POST['login'])) {
                            $validador->mostrar_error();
                        }
                        ?>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" class="btn btn-success" name="login">Iniciar Sesi&oacute;n</button>
                            </div>
                        </div>
                    </form>
                </div>                     
            </div>  
        </div>
    </div>
    <?php
    include_once 'plantillas/html_cierre.inc.php';
    ?>
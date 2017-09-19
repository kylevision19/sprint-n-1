<?php
include_once 'clases/config.inc.php';
include_once 'clases/Conexion.inc.php';
include_once 'clases/Usuario.inc.php';
include_once 'clases/Login.inc.php';
include_once 'clases/RepositorioUsuario.inc.php';
include_once 'clases/ValidadorLogin.inc.php';
include_once 'clases/ValidadorRegistro.inc.php';
include_once 'clases/Redireccion.inc.php';

$tatal_usuario = RepositorioUsuario :: obtener_numero_usuarioL(Conexion :: obtener_conexion());

if (isset($_POST['enviar'])) {
    Conexion :: abrir_conexion();

    $validador = new ValidadorRegistro($_POST['cedula'], $_POST['nombre1'], $_POST['nombre2'], $_POST['apellido1'],
            $_POST['apellido2'], $_POST['correo'], $_POST['telefono'], $_POST['Cod_usuarios'], Conexion :: obtener_conexion());
            
    if ($validador->registro_valido()) {
        $usuario = new Usuario('', $validador->obtener_cedula(), $validador->obtener_nombre1(), $validador->obtener_nombre2(), $validador->obtener_apellido1(), $validador->obtener_apellido2(), $validador->obtener_correo(), $validador->obtener_telefono(), $validador->obtener_cod_usuario());
           
           $nombre1 = $usuario -> obtener_nombre1();
            $apellido1=$usuario -> obtener_apellido1();
            $apellido2=$usuario -> obtener_apellido2();
            $cedula=$usuario -> obtener_cedula();
            if ($_POST['Cod_usuarios']==1) {
                $tip_usuario=Coordinador;
            }else{
                $tip_usuario=Estudiantes;
            }
            
            $nombreUsuario=$nombre1.'.'.$apellido1.$apellido2[0].$apellido2[1];
            $clave=password_hash($apellido1[0].$cedula, PASSWORD_DEFAULT);
            
            
            
            $usuario_insertadoL = RepositorioUsuario :: insertar_login(Conexion :: obtener_conexion(), $tip_usuario, $nombreUsuario, $clave);
            
            $usuario_insertado = RepositorioUsuario :: insertar_coordinador(Conexion :: obtener_conexion(), $usuario);
        
         if ($usuario_insertado) {
            Redireccion :: redirigir(RUTA_REGISTRO_CORRECTO . '?nombre1=' . $usuario->obtener_nombre1());
        }
    }
    Conexion :: cerrar_conexion();
}


$titulo = 'Registro';

include_once 'plantillas/html_inicio.inc.php';
include_once 'plantillas/barraNavegacion.inc.php';
?> 
<br><br>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formurario de registro</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Instruciones
                    </h3>
                </div>
                <div class="panel-body">
                    <br>
                    <p class="text-justify">
                        Escribe tu nombre, correo electrónico, contraseña, fecha de nacimiento.
                        Haz clic en Crear una cuenta.
                        Para terminar de crear la cuenta, deberás confirmar tu dirección de correo electrónico o número de teléfono celular.
                    </p>
                    <br>
                    <a href="#">¿Olvidaste tu contraceña?</a>
                    <br>
                    <br>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce tus datos
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'plantillas/registro_validado.inc.php';
                        } else {
                            include_once 'plantillas/registro_vacio.inc.php';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/html_cierre.inc.php';
?> 
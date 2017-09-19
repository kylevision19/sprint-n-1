<?php

include_once 'clases/config.inc.php';
include_once 'clases/Conexion.inc.php';
include_once 'clases/RepositorioUsuario.inc.php';
include_once 'clases/Redireccion.inc.php';

if (isset($_GET['nombre1']) && !empty($_GET['nombre1'])) {
    $nombre1= $_GET['nombre1'];
} 

     


$titulo = '¡Registro correcto!';

include_once 'plantillas/html_inicio.inc.php';
include_once 'plantillas/barraNavegacion.inc.php';
?> 

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>  Registro correcto
                </div><br><br><br>
                <div class="panel-body text-center">
                    <p>¡<b><?php echo $nombre1 ?></b> A quedado registrado correctamente!</p>
                    <br>
                    <p><a href="<?php echo RUTA_VICERRECTOR ?>">Regresar a tu pag de inicio</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/html_cierre.inc.php';
?> 
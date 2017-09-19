<?php
include_once 'clases/ControlSesion.inc.php';
include_once 'clases/config.inc.php';
include_once 'clases/Redireccion.inc.php';


?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h5>SemilleroFunlam</h5>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <?php
            if (ControlSesion :: sesion_iniciada()) {
                ?>
                <ul class="nav navbar-nav navbar">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sedes<span class="caret"></span></a> 
                        <ul class="dropdown-menu">
                            <li><a href="sedeApartado.php">Apartadó</a>
                            </li> <li><a href="sedeBogota.php">Bogotá</a></li>
                            <li><a href="sedeManizales.php">Manizales</a></li> 
                            <li><a href="sedeMonteria.php">Monteria</a></li> <li role="separator" class="divider"></li> 
                            <li class="dropdown-header">otras</li> 
                        </ul> 
                    </li>
                </ul>
            <ul class="nav navbar-nav navbar">
                <li><a href="<?php echo RUTA_SEMILLERO1 ?>">Inscripciones</a></li>
            </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo '' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li>
                        <a  href="<?php echo RUTA_LOGOUT ?>">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar sesion
                        </a>
                    </li>
                    <?php
                } else {
                    ?>
                    <?php
                         Redireccion :: redirigir(SERVIDOR);
                     }
                    ?>
            </ul>
        </div> 

    </div>
</nav>


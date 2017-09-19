<?php
   
    
    $titulo = 'funlam';
    
    include_once 'plantillas/html_inicio.inc.php';
    include_once 'plantillas/barraNavegacion.inc.php';
?> 
<br>
<br>
<br>
<div class="container">
    <div class="jumbotron"> 
        <h3>Funlam.edu.co</h3>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Menu
                        </div>
                        <div class="panel-body">
                            <div class="panel-group">
                                <ul>
                                    <li><a href="#">Publicar</a></li><br>
                                    <li><a href="#">Publicaciones</a></li><br>
                                    <li><a href="#">semilleros</a></li><br>
                                    <li><a href="#">Horarios de semillero</a></li><br>
                                    <li><a href="<?php echo RUTA_COORDINADOR ?>">Coordinadores</a></li><br>
                                    <li><a href="#">Integrantes</a></li><br>
                                    <li><a href="#">Añadir sedes</a></li><br>
                                    <li><a href="#">Modificar sedes</a></li><br>
                                    <li><a href="#">Añadir facultad</a></li><br>
                                    <li><a href="#">Modificar facultad</a></li><br>
                                    <li><a href="#">Añadir programa</a></li><br>
                                    <li><a href="#">Modificar programa</a></li><br>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Actividades
                </div>
                <div class="panel-body">
                    <p>Todabia no hay actividades</p> 
                </div>
            </div>
        </div>
    </div>
</div>  
<?php
     include_once 'plantillas/html_cierre.inc.php';
?> 

<?php
include_once 'clases/Conexion.inc.php';
include_once 'clases/RepositorioUsuario.inc.php';

$tatal_usuario = RepositorioUsuario :: obtener_numero_usuarioL(Conexion :: obtener_conexion());
?>

<div class="form-group">
    <label>Ingrese su primer nombre:</label>
    <input type="text" class="form-control" name="nombre1"><br>
    <label>Ingrese su segundo nombre:</label>
    <input type="text" class="form-control" name="nombre2" >
    
</div>
<div class="form-group">
    <label>Ingrese su primer apellido</label>
    <input type="text" class="form-control" name="apellido1" ><br>
    
    <label>Ingrese su segundo apellido</label>
    <input type="text" class="form-control" name="apellido2" >
   
</div>
<div class="form-group">
    <label>Cedula</label>
    <input type="text" class="form-control" name="cedula" >
</div>
<div class="form-group">
    <label>Correo</label>
    <input type="email" class="form-control" name="correo" >
</div>
<div class="form-group">
    <label>Telefono</label>
    <input type="text" class="form-control" name="telefono" >
</div>

<div class="form-group">
    <label for="Cod_usuarios">Usuario a ingresar</label>
    <select name="Cod_usuarios">
        <option value="1">Coordinador</option>
        <option value="2">Estudiantes</option>    
    </select>
    
</div>

<button type="submit" class="btn btn-default btn-primary" name="enviar">Inscribirse</button>

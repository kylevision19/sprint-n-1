
<div class="form-group">
    <label>Ingrese su primer nombre:</label>
    <input type="text" class="form-control" name="nombre1" <?php $validador -> mostrar_nombre1() ?>><br>
    <?php
             $validador -> mostrar_error_nombre1();
    ?>

    <label>Ingrese su segundo nombre:</label>
    <input type="text" class="form-control" name="nombre2" <?php $validador -> mostrar_nombre2() ?>><br>
    <?php
             $validador -> mostrar_error_nombre2();
    ?>
</div>
<div class="form-group">
    <label>Ingrese su primer apellido</label>
    <input type="text" class="form-control" name="apellido1" <?php $validador -> mostrar_apellido1() ?>><br>
    <?php
             $validador -> mostrar_error_apellido1();
    ?>
    <label>Ingrese su segundo apellido</label>
    <input type="text" class="form-control" name="apellido2" <?php $validador -> mostrar_apellido2() ?>>
    <?php
             $validador -> mostrar_error_apellido2();
    ?>
</div>
<div class="form-group">
    <label>Cedula</label>
    <input type="text" class="form-control" name="cedula" <?php $validador -> mostrar_cedula() ?>>
    <?php
             $validador -> mostrar_error_cedula();
    ?>
</div>
<div class="form-group">
    <label>Correo</label>
    <input type="email" class="form-control" name="correo" <?php $validador -> mostrar_correo() ?>>
    <?php
             $validador -> mostrar_error_correo();
    ?>
</div>
<div class="form-group">
    <label>Telefono</label>
    <input type="text" class="form-control" name="telefono" <?php $validador -> mostrar_telefono() ?>>
    <?php
             $validador -> mostrar_error_telefono();
    ?>
</div>

<div class="form-group">
    <label for="Cod_usuarios">Usuario a ingresar</label>
    <select name="Cod_usuarios" <?php $validador -> mostrar_cod_usuario() ?>>
    <?php
             $validador -> mostrar_error_cod_usuario();
    ?>>
        <option value="1">Coordinador</option>
        <option value="2">Estudiantes</option>    
    </select> 
</div>

<button type="submit" class="btn btn-default btn-primary" name="enviar">Inscribir</button>
<div class="row">
  <div class="col col-6">
    <form action="" method="post">
      <div class="mb-2">
        <label for="empl_inss" class="form-label">INNS:</label>
        <input required type="text" class="form-control" name="empl_inss" id="empl_inss" aria-describedby="helpId" placeholder="Inss  ">
      </div>
      <div class="mb-2">
        <label for="empl_nombre" class="form-label">Nombre:</label>
        <input required type="text" class="form-control" name="empl_nombre" id="empl_nombre" aria-describedby="helpId" placeholder="Nombre del empleado  ">
      </div>
      <div class="mb-2">
        <label for="empl_cedula" class="form-label">Cedula:</label>
        <input required type="text" class="form-control" name="empl_cedula" id="empl_cedula" aria-describedby="helpId" placeholder="001-211101-211110D  ">
      </div>
      <div class="mb-2">
        <label for="empl_telefono" class="form-label">Telefono:</label>
        <input required type="text" class="form-control" name="empl_telefono" id="empl_telefono" aria-describedby="helpId" placeholder="84549735 ">
      </div>
      <div class="mb-2">
        <label for="empl_estado_civil" class="form-label">Estado civil:</label>
        <input required type="text" class="form-control" name="empl_estado_civil" id="empl_estado_civil" aria-describedby="helpId" placeholder="soltero  ">
      </div>
      <div class="mb-2">
        <label for="empl_direccion" class="form-label">Dirección:</label>
        <input required type="text" class="form-control" name="empl_direccion" id="empl_direccion" aria-describedby="helpId" placeholder="Direccion ">
      </div>
      <div class="mb-2">
        <label for="empl_fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
        <input required type="date" class="form-control" name="empl_fecha_nacimiento" id="empl_fecha_nacimiento" aria-describedby="helpId" placeholder="21/11/2001  ">
      </div>
      <div class="mb-2">
        <label for="empl_genero_persona" class="form-label">Genero:</label>
        <input required type="text" class="form-control" name="empl_genero_persona" id="empl_genero_persona" aria-describedby="helpId" placeholder="Genero">
      </div>
      <div class="mb-2">
        <label for="empl_usuario_id" class="form-label">Usuario:</label>
        <select class="form-select" aria-label="Default select example" name="empl_usuario_id" id="empl_usuario_id">
          <option selected >Seleccione un usuario</option>
          <?php foreach ($usuarios as $usuario) { ?>
            <?php print_r($usuarios) ?>
            <option value="<?php echo $usuario->usr_codigo ?>"><?php echo $usuario->usr_nombre ?></option>
          <?php } ?>
        </select>
      </div>
      <input name="" id="" class="btn btn-success" type="Submit" value="Agregar empleado">
      <a href="?controlador=empleado&accion=inicio" class="btn btn-info">Cancelar</a>
    </form>
  </div>
</div>
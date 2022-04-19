<div class="row">
    <div class="col col-6">
        <form action="" method="post">

            <div class="mb-2">
                <label for="empl_codigo" class="form-label">Id:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_codigo; ?>" name="empl_codigo" id="empl_codigo" aria-describedby="helpId" placeholder="Inss  ">
            </div>
            <div class="mb-2">
                <label for="empl_inss" class="form-label">INNS:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_inss; ?>" name="empl_inss" id="empl_inss" aria-describedby="helpId" placeholder="Inss  ">
            </div>
            <div class="mb-2">
                <label for="empl_nombre" class="form-label">Nombre:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_nombre; ?>" name="empl_nombre" id="empl_nombre" aria-describedby="helpId" placeholder="Nombre del empleado  ">
            </div>
            <div class="mb-2">
                <label for="empl_cedula" class="form-label">Cedula:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_cedula; ?>" name="empl_cedula" id="empl_cedula" aria-describedby="helpId" placeholder="001-211101-211110D  ">
            </div>
            <div class="mb-2">
                <label for="empl_telefono" class="form-label">Telefono:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_telefono; ?>" name="empl_telefono" id="empl_telefono" aria-describedby="helpId" placeholder="84549735 ">
            </div>
            <div class="mb-2">
                <label for="empl_estado_civil" class="form-label">Estado civil:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_estado_civil; ?>" name="empl_estado_civil" id="empl_estado_civil" aria-describedby="helpId" placeholder="soltero  ">
            </div>
            <div class="mb-2">
                <label for="empl_direccion" class="form-label">Dirección:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_direccion; ?>" name="empl_direccion" id="empl_direccion" aria-describedby="helpId" placeholder="Direccion ">
            </div>
            <div class="mb-2">
                <label for="empl_fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input required type="date" class="form-control" value="<?php echo $empleado->empl_fecha_nacimiento; ?>" name="empl_fecha_nacimiento" id="empl_fecha_nacimiento" aria-describedby="helpId" placeholder="21/11/2001  ">
            </div>
            <div class="mb-2">
                <label for="empl_genero" class="form-label">Genero:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_genero; ?>" name="empl_genero" id="empl_genero" aria-describedby="helpId" placeholder="Genero">
            </div>
            <div class="mb-2">
                <label for="empl_estado" class="form-label">Estado:</label>
                <input required type="text" class="form-control" value="<?php echo $empleado->empl_estado; ?>" name="empl_estado" id="empl_genero" aria-describedby="helpId" placeholder="Genero">
            </div>
            <div class="mb-2">
                <label for="empl_usuario_id" class="form-label">Usuario:</label>
                <select class="form-select" aria-label="Default select example" name="empl_usuario_id" id="empl_usuario_id">
                    <option disabled>Seleccione un usuario</option>
                    <?php foreach ($usuarios as $usuario) { ?>

                        <option value="<?php echo $usuario->usr_codigo ?>"><?php echo $usuario->usr_nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <input name="" id="" class="btn btn-success" type="Submit" value="Agregar empleado">
            <a href="?controlador=empleado&accion=inicio" class="btn btn-info">Cancelar</a>
        </form>
    </div>
</div>
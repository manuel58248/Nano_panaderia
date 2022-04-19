<div class="row">
    <div class="col col-6 col-offset-3">
        <form method="POST">
            <div class="mb-3">
                <label for="usuario_codigo" class="form-label">Usuario codigo</label>
                <input type="text" class="form-control" id="usuario_codigo" name="usuario_codigo" disabled value="<?php echo $usuario_codigo; ?>">
            </div>
            <select class="form-select" aria-label="Default select example" name="rol_codigo">
                <option selected disabled>Selecciona un rol</option>
                <?php foreach($listaRoles as $rol) { ?>
                    <option value="<?php echo $rol->rol_codigo; ?>"><?php echo $rol->rol_nombre; ?></option>
                <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
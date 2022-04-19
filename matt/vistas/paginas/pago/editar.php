<div class="row">

    <div class="col col-6">

        <form action="" method="post">

            <div class="mb-2">
                <label for="area_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?php echo $pago->mp_nombre; ?>" name=" mp_nombre" id="mp_nombre" aria-describedby="helpId" placeholder="Nombre  ">

            </div>

            <div class="mb-2">
                <label for="area_descripcion" class="form-label">Estado:</label>
                <input type="text" class="form-control" value="<?php echo $pago->mp_estado; ?>" name="mp_estado" id="mp_estado" aria-describedby="helpId" placeholder="Descripcion  ">

            </div>

            <input name="" id="" class="btn btn-success" type="Submit" value="Actualizar Metodo Pago">
            <a href="?controlador=area&accion=inicio" class="btn btn-info">Cancelar</a>

        </form>
    </div>
</div>
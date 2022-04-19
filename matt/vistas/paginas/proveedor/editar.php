<div class="row">

    <div class="col col-6">

        <form action="" method="post">


            <div class="mb-2">
                <label for="proveed_nombre" class="form-label">Nombre:</label>
                <input required type="text" class="form-control" value="<?php echo $proveedor->proveed_nombre; ?>" name="proveed_nombre" id="" aria-describedby="helpId" placeholder="  ">

            </div>

            <div class="mb-2">
                <label for="proveed_telefono" class="form-label">Telefono:</label>
                <input required type="text" class="form-control" value="<?php echo $proveedor->proveed_telefono; ?>" name="proveed_telefono" id="" aria-describedby="helpId" placeholder="  ">

            </div>
            <div class="mb-2">
                <label for="proveed_correo" class="form-label">Correo:</label>
                <input required type="text" class="form-control" value="<?php echo $proveedor->proveed_correo; ?>" name="proveed_correo" id="" aria-describedby="helpId" placeholder="  ">

            </div>
            <div class="mb-2">
                <label for="proveed_estado" class="form-label">Estado:</label>
                <input required type="text" class="form-control" value="<?php echo $proveedor->proveed_estado; ?>" name="proveed_estado" id="" aria-describedby="helpId" placeholder="  ">

            </div>

            <input name="" id="" class="btn btn-success" type="Submit" value="Editar Proveedor">
            <a href="?controlador=proveedor&accion=inicio" class="btn btn-info">Cancelar</a>

        </form>
    </div>
</div>
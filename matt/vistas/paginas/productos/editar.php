<div class="row">

    <div class="col col-6">

        <form action="" method="post">


            <div class="mb-4">
                <label for="producto_nombre" class="form-label">Nombre</label>
                <input required type="text" class="form-control" value="<?php echo $Producto->producto_nombre; ?>" name="producto_nombre" id="producto_nombre" aria-describedby="helpId" placeholder="  ">

            </div>

            <div class="mb-2">
                <label for="producto_marca" class="form-label">Marca:</label>
                <input type="text" class="form-control" value="<?php echo $Producto->producto_marca; ?>" name="producto_marca" id="producto_marca" aria-describedby="helpId" placeholder="Descripcion  ">

            </div>
            <div class="mb-2">
                <label for="producto_clasificacion" class="form-label">Clasificacion:</label>
                <input type="text" class="form-control" value="<?php echo $Producto->producto_clasificacion; ?>" name="producto_clasificacion" id="producto_clasificacion" aria-describedby="helpId" placeholder="Descripcion  ">

            </div>
            <div class="mb-2">
                <label for="producto_unidad_medida" class="form-label">Unidad Medida:</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Seleccione la unidad de medida</option>
                    <option value="1">Kg</option>
                    <option value="2">lbs</option>
                    <option value="3">Oz</option>
                </select>
                <input type="text" class="form-control" value="<?php echo $Producto->producto_unidad_medida; ?>" name="producto_unidad_medida" id="producto_unidad_medida" aria-describedby="helpId" placeholder="Descripcion  ">

            </div>
            <div class="mb-2">
                <label for="producto_stock" class="form-label">Cantidad:</label>
                <input type="text" class="form-control" value="<?php echo $Producto->producto_stock; ?>" name="producto_stock" id="producto_stock" aria-describedby="helpId" placeholder="Descripcion  ">

            </div>

            <div class="mb-2">
                <label for="producto_precio" class="form-label">Precio:</label>
                <input type="text" class="form-control" value="<?php echo $Producto->producto_precio; ?>" name="producto_precio" id="producto_precio" aria-describedby="helpId" placeholder="Descripcion  ">

            </div>
            <div class="mb-2">
                <label for="producto_estado" class="form-label">Estado:</label>
                <input type="text" class="form-control" value="<?php echo $Producto->producto_estado; ?>" name="producto_estado" id="producto_estado" aria-describedby="helpId" placeholder="Descripcion  ">

            </div>

            <input name="" id="" class="btn btn-success" type="Submit" value="Actualizar Productos">
            <a href="?controlador=productos&accion=editar&producto_codigo" class="btn btn-info">Cancelar</a>

        </form>
    </div>
</div>
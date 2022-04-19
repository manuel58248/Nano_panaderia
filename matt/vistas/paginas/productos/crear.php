<div class="row">

    <div class="col col-6">

        <form action="" method="post">

            <h1> Formulario de productos</h1>
            <div class="mb-4">
                <label for="producto_nombre" class="form-label">Nombre</label>
                <input required type="text" class="form-control" name=" producto_nombre" id="producto_nombre" aria-describedby="helpId" placeholder="  ">

            </div>

            <div class="mb-4">
                <label for="producto_marca" class="form-label">Marca:</label>
                <input required type="text" class="form-control" name="producto_marca" id="producto_marca" aria-describedby="helpId" placeholder="  ">

            </div>
            <div class="mb-4">
                <label for="producto_clasificacion" class="form-label">Clasificacion:</label>
                <select class="form-select" name="producto_clasificacion" id="producto_clasificacion" aria-label="Default select example">
                    <option selected>Seleccione la Clasificacion</option>
                    <option value="1">Materia prima</option>
                    <option value="2">Productos Terminado</option>

                </select>
                <!-- <input class="form-control" name="producto_clasificacion" id="producto_clasificacion" aria-describedby="helpId" placeholder="  "> -->

            </div>
            <div class="mb-4">
                <label for="producto_unidad_medida" class="form-label">Unidad de medida:</label>
                <!-- <input required type="text" class="form-control" name="producto_unidad_medida" id="producto_unidad_medida" aria-describedby="helpId" placeholder="  "> -->
                <select class="form-select" name="producto_unidad_medida" id="producto_unidad_medida" aria-label="Default select example">
                    <option selected>Seleccione la unidad de medida</option>
                    <option value="1">Kg</option>
                    <option value="2">lbs</option>
                    <option value="3">Oz</option>
                </select>

            </div>
            <div class="mb-4">
                <label for="producto_stock" class="form-label">Cantidad:</label>
                <input required type="text" class="form-control" name="producto_stock" id="producto_stock" aria-describedby="helpId" placeholder="  ">

            </div>
            <div class="mb-4">
                <label for="producto_precio" class="form-label">Precio:</label>
                <input required type="text" class="form-control" name="producto_precio" id="producto_precio" aria-describedby="helpId" placeholder="  ">
            </div>
            <div class="mb-4">
                <label for="producto_fecha_ingresado" class="form-label">Fecha ingresado:</label>
                <input required type="date" class="form-control" name="producto_fecha_ingresado" id="producto_fecha_ingresado" aria-describedby="helpId" placeholder="  ">
            </div>

            <div class="mb-4">
                <label for="producto_fecha_vencida" class="form-label">Fecha Vencimiento:</label>
                <input required type="date" class="form-control" name="producto_fecha_vencida" id="producto_fecha_vencida" aria-describedby="helpId" placeholder="  ">
            </div>


            <input name="" id="" class="btn btn-success" type="Submit" value="Agregar Producto">
            <a href="?controlador=productos&accion=inicio" class="btn btn-info">Cancelar</a>

        </form>
    </div>
</div>
<?php
include_once "../../sidebar/sidebar.php"
?>

<div class="row">

    <div class="col col-6">

        <form action="" method="post" id="crearProducto">

            <h1> Formulario de productos</h1>
            <div class="mb-4">
                <label for="producto_codigo_unico" class="form-label">Codigo del producto</label>
                <input required type="text" class="form-control" name="producto_codigo_unico" id="producto_codigo_unico"
                    aria-describedby="helpId" placeholder="">

            </div>

            <div class="mb-4">
                <label for="producto_nombre" class="form-label">Nombre del Producto:</label>
                <input required type="text" class="form-control" name="producto_nombre" id="producto_nombre"
                    aria-describedby="helpId" placeholder="">

            </div>

            <div class="mb-4">
                <label for="producto_precio_compra" class="form-label">Precio de compra</label>
                <input required type="text" class="form-control" name="producto_precio_compra"
                    id="producto_precio_compra" aria-describedby="helpId" placeholder="">

            </div>

            <div class="mb-4">
                <label for="producto_um_id" class="form-label">Unidad de medida:</label>
                <select class="form-select" aria-label="Default select example" id="producto_um_id">
                    <option selected>Seleccione su opcion</option>
                    <option value="1">Libras</option>
                    <option value="2">Litros</option>
                    <option value="3">Unidades</option>
                </select>

            </div>


            <div class="mb-4">
                <label for="producto_presentacion_id" class="form-label">Presentacion del producto:</label>
                <select class="form-select" aria-label="Default select example" id="producto_presentacion_id">
                    <option selected>Seleccione su opcion</option>
                    <option value="1">Saco</option>
                    <option value="2">Libra</option>
                    <option value="3">Empaquetado</option>
                </select>

            </div>

            <div class="mb-4">
                <label for="producto_comentario" class="form-label">Comentario</label>
                <input required type="text" class="form-control" name="producto_comentario" id="producto_comentario"
                    aria-describedby="helpId" placeholder="  ">

            </div>
            <div class="mb-4">
                <label for="producto_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                <input required type="date" class="form-control" name="producto_vencimiento" id="producto_vencimiento"
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-4">
                <label for="producto_stock" class="form-label">Cantidad</label>
                <input required type="text" class="form-control" name="producto_stock" id="producto_stock"
                    aria-describedby="helpId" placeholder="">
            </div>

            <button type="submit" class="btn btn-primary">Agregar Producto</button>
            <a href="./inicio.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearProducto.js"></script>

<?php
include_once "../../sidebar/footer.php"
?>


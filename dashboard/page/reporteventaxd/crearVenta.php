<?php
include_once "../../sidebar/sidebar.php"
?>

<div class="row">

    <div class="col col-6">

        <form action="" method="post" id="crearP">
            <div class="mb-2">
                <label for="proveed_nombre" class="form-label">Nombre del producto:</label>
                <input required type="required" class="form-control" name="proveed_nombre" id="proveed_nombre" aria-describedby="helpId" placeholder="  ">

            </div>

            <div class="mb-2">
                <label for="proveed_telefono" class="form-label">Telefono:</label>
                <input required type="text" class="form-control" name="proveed_telefono" id="proveed_telefono" aria-describedby="helpId" placeholder="  ">

            </div>

            <div class="mb-2">
                <label for="proveed_correo" class="form-label">Correo:</label>
                <input required type="text" class="form-control" name="proveed_correo" id="proveed_correo" aria-describedby="helpId" placeholder="  ">

            </div>


            <input name="" id="" class="btn btn-success" type="Submit" value="Agregar Proveedor">
            <a href="./insertarProveedor.php" class="btn btn-info">Cancelar</a>

        </form>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearProveedor.js"></script>

<?php
include_once "../../sidebar/footer.php"
?>
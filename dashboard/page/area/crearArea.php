<?php
include_once "../../sidebar/sidebar.php";
?>


<div class="row">

    <div class="col col-6">

        <form action="" method="post" id="crearArea">


            <div class="mb-2">
                <label for="area_nombre" class="form-label">Nombre</label>
                <input required type="text" class="form-control" name=" area_nombre" id="area_nombre" aria-describedby="helpId" placeholder="Nombre  ">

            </div>

            <div class="mb-2">
                <label for="area_descripcion" class="form-label">Descripcion:</label>
                <input required type="text" class="form-control" name="area_descripcion" id="area_descripcion" aria-describedby="helpId" placeholder="Descripcion  ">

            </div>
            <button type="submit" class="btn btn-primary">Agregar Area</button>
            <a href="./inicio.php" class="btn btn-danger">Cancelar</a>
        </form>


    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearArea.js"></script>

<?php
include_once "../../sidebar/footer.php"
?>
<?php
include_once "../../sidebar/sidebar.php";


include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT * FROM cat_produccion";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

$formu = "SELECT * FROM cat_formula";
$pro = $conexion->prepare($formu);
$pro->execute();
$formula = $pro->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="row">

    <div class="col col-6">

        <form action="" method="post" id="crearProduccion">

            <div class="mb-2">
                <label for="produccion_nombre" class="form-label">Descripcion</label>
                <input required type="text" class="form-control" name="produccion_descripcion" id="produccion_descripcion" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-2">
                <label for="produccion_nombre" class="form-label">Codigo 1</label>
                <input required type="text" class="form-control" name="dt_produccion_codigo_unico" id="dt_produccion_codigo_unico" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-2">
                <label for="formula_descripcion" class="form-label">Cantidad.</label>
                <input required type="number" class="form-control" name="dt_produccion_cantidad" id="dt_produccion_cantidad" aria-describedby="helpId" placeholder="Cantidad">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Formula.</label>
                <select class="form-select" aria-label="Default select example" id="dt_produccion_formula_id ">
                    <option selected>Seleccione el producto</option>
                    <?php foreach ($formula as $dat) { ?>
                        <option value="<?php echo $dat['formula_codigo'] ?>"><?php echo $dat['formula_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-2">
                <label for="formula_descripcion" class="form-label">Precio venta</label>
                <input required type="text" class="form-control" name="dt_produccion_precio_venta" id="dt_produccion_precio_venta" aria-describedby="helpId" placeholder="Precio venta: 25">
            </div>

            <div class="mb-2">
                <label for="produccion_fecha_inicio" class="form-label">Fecha de vencimiento.</label>
                <input required type="date" class="form-control" name="dt_produccion_vecimiento" id="dt_produccion_vecimiento" aria-describedby="helpId" placeholder="  ">
            </div>

            <div class="mb-2">
                <label for="formula_descripcion" class="form-label">Comentario.</label>
                <input required type="text" class="form-control" name="dt_produccion_comentario" id="dt_produccion_comentario" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-2">
                <label for="produccion_fecha_inicio" class="form-label">Hora estimada.</label>
                <input required type="datetime-local" class="form-control" name="dt_produccion_hora_estimada" id="dt_produccion_hora_estimada" aria-describedby="helpId" placeholder="  ">
            </div>

            <button type="submit" class="btn btn-primary">Agregar Produccion</button>
            <a href="./inicio.php" class="btn btn-danger">Regresar</a>
        </form>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearProduccion.js"></script>

<?php
include_once "../../sidebar/footer.php"
?>
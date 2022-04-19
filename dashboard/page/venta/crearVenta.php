<?php
include_once "../../sidebar/sidebar.php";
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT * FROM cat_venta";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

$produc = "SELECT * FROM cat_producto";
$pro = $conexion->prepare($produc);
$pro->execute();
$producto = $pro->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row">

    <div class="col col-6">

        <form action="" method="post" id="crearVenta">

            <div class="mb-2">
                <label for="venta_cliente_id " class="form-label">Cliente:</label>
                <input required type="text" class="form-control" name="venta_cliente_id  " id="venta_cliente_id " aria-describedby="helpId" placeholder="  ">

            </div>
            <div class="mb-4">
                <label for="producto_um_id" class="form-label">Metodo de pago:</label>
                <select class="form-select" aria-label="Default select example" id="venta_metodo_pago_id ">
                    <option selected>Seleccione su opcion</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Tarjeta de credito</option>

                </select>

            </div>

            <div class="mb-2">
                <label for="produccion_fecha_inicio" class="form-label">Descripcion</label>
                <input required type="text" class="form-control" name="venta_descripcion " id="venta_descripcion" aria-describedby="helpId" placeholder="  ">

            </div>
            <div class="mb-2">

                <label for="empl_nombre" class="form-label">Producto</label>
                <select class="form-select" aria-label="Default select example" id="pro">
                    <option selected>Seleccione el producto</option>

                    <?php foreach ($producto as $dat) { ?>
                        <option value="<?php echo $dat['producto_codigo'] ?>"><?php echo $dat['producto_nombre'] ?></option>
                    <?php } ?>

                </select>

            </div>

            <div class="mb-2">
                <label for="formula_descripcion" class="form-label">Cantidad:</label>
                <input required type="text" class="form-control" name="cant" id="cant" aria-describedby="helpId" placeholder="Cantidad">
            </div>

            <div class="mb-2 d-grid gap-2">
                <button type="button" onclick="agregarProducto()" class="btn btn-primary">Agregar</button>
            </div>

            <table class="table table-striped" id="tabl">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Cantidades</th>

                    </tr>
                </thead>
                <tbody id="tablita" name="tablita">

                </tbody>
            </table>

            <!-- mirar si se hace descuento  -->
            <div class="mb-2">
                <label for="produccion_fecha_inicio" class="form-label">Descuento</label>
                <input required type="text" class="form-control" name="venta_descuento " id="venta_descuento" aria-describedby="helpId" placeholder="  ">

            </div>
            <!--  -->
            <div class="mb-2">
                <label for="produccion_fecha_inicio" class="form-label">Impuesto</label>
                <input required type="text" readonly value="0.15" class="form-control" name="venta_impuesto " id="venta_impuesto" aria-describedby="helpId" placeholder="  ">

            </div>

            <div class="mb-2">
                <label for="produccion_fecha_inicio" class="form-label">SubTotal</label>
                <input required type="text" class="form-control" name="venta_subtotal " id="venta_subtotal" aria-describedby="helpId" placeholder="  ">

            </div>

            <div class="mb-2">
                <label for="produccion_fecha_inicio" class="form-label">Total</label>
                <input required type="text" class="form-control" name="venta_total " id="venta_total" aria-describedby="helpId" placeholder="  ">

            </div>

            <button type="submit" class="btn btn-primary">Generar Venta</button>
            <a href="./inicio.php" class="btn btn-danger">Regresar</a>
        </form>

        </form>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearVenta.js"></script>

<?php
include_once "../../sidebar/footer.php"
?>
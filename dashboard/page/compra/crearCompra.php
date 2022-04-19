<?php
include_once "../../sidebar/sidebar.php";
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$resultado = $conexion->prepare($consulta);
$resultado->execute();
// insertar producto
$usua = "SELECT * FROM cat_usuario";
$usu = $conexion->prepare($usua);
$usu->execute();
$usuario = $usu->fetchAll(PDO::FETCH_ASSOC);
// print_r($usuario);
// insertar proveedor
$prov = "SELECT * FROM cat_proveedor";
$pro = $conexion->prepare($prov);
$pro->execute();
$proveedor = $pro->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row">

    <div class="col col-6">
        <form action="" method="post" id="crearCompra">

            <div class="mb-2">

                <label for="compra_proveedor_id" class="form-label">Proveedor</label>
                <select class="form-select" aria-label="Default select example" id="compra_proveedor_id">
                    <option selected>Seleccione el producto</option>

                    <?php foreach ($proveedor as $dat) { ?>
                        <option value="<?php echo $dat['proveed_codigo'] ?>"><?php echo $dat['proveed_nombre'] ?></option>
                    <?php } ?>

                </select>

            </div>
            <div class="mb-4">
                <label for="compra_mp_id " class="form-label">Metodo de pago:</label>
                <select class="form-select" aria-label="Default select example" id="compra_mp_id  ">
                    <option disabled>Seleccione su opcion</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Tarjeta de credito</option>

                </select>
            </div>

            <div class="mb-2">
                <label for="produccion_fecha_inicio" class="form-label">Descripcion</label>
                <input required type="text" class="form-control" name="compra_descripcion " id="compra_descripcion" aria-describedby="helpId" placeholder="  ">

            </div>
            <div class="mb-2">

                <label for="empl_nombre" class="form-label">Usuario</label>
                <select class="form-select" aria-label="Default select example" id="compra_usr_id">
                    <option selected>Seleccione el producto</option>

                    <?php foreach ($usuario as $dat) { ?>
                        <option value="<?php echo $dat['usr_codigo'] ?>"><?php echo $dat['usr_nombre'] ?></option>
                    <?php } ?>

                </select>


                <div class="mb-2">
                    <label for="produccion_fecha_inicio" class="form-label">SubTotal</label>
                    <input required type="number" class="form-control" name="compra_subtotal" id="compra_subtotal" aria-describedby="helpId" placeholder="  ">

                </div>
                <!-- mirar si se hace descuento  -->
                <div class="mb-2">
                    <label for="produccion_fecha_inicio" class="form-label">Descuento</label>
                    <input required type="number" class="form-control" name="compra_descuento" id="compra_descuento" aria-describedby="helpId" placeholder="  ">

                </div>
                <!--  -->
                <div class="mb-2">
                    <label for="produccion_fecha_inicio" class="form-label">Total a Pagar</label>
                    <input required type="number" class="form-control" name="compra_total" id="compra_total" aria-describedby="helpId" placeholder="  ">

                </div>

                <div class="mb-2">
                    <label for="produccion_fecha_inicio" class="form-label">Fecha Registro</label>
                    <input required type="date" class="form-control" name="compra_fecha_registro" id="compra_fecha_registro" aria-describedby="helpId" placeholder="  ">

                </div>

                <div class="mb-2">
                    <label for="produccion_fecha_inicio" class="form-label">Fecha de entrega</label>
                    <input required type="date" class="form-control" name="compra_fecha_entrega" id="compra_fecha_entrega" aria-describedby="helpId" placeholder="  ">

                </div>
                <button type="submit" class="btn btn-primary">Agregar Area</button>
                <a href="./inicio.php" class="btn btn-danger">Cancelar</a>
        </form>


    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearCompra.js"></script>

<?php
include_once "../../sidebar/footer.php"
?>
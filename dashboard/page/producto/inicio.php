<?php
include_once "../../sidebar/sidebar.php";

$consulta = "SELECT * FROM cat_producto";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="./crearProducto.php" role="button">Crear Produccion</a>
    </div>
    <div class="col col-12 table-responsive ">
        <table class="table" id="producto">
            <h1 class="display-6 mb-4">Lista del Producto </h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codigo Producto</th>
                    <th>Nombre</th>
                    <th>Precio de compra</th>
                    <th>Registro</th>
                    <th>Vencimiento</th>
                    <th>uniqid</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <!-- <th>Opciones</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dat) {
                ?>
                    <tr>
                        <td><?php echo $dat['producto_codigo'] ?></td>
                        <td><?php echo $dat['producto_codigo_unico'] ?></td>
                        <td><?php echo $dat['producto_nombre'] ?></td>
                        <td><?php echo $dat['producto_precio_compra'] ?></td>
                        <td><?php echo $dat['producto_um_id'] ?></td>
                        <td><?php echo $dat['producto_registro'] ?></td>
                        <td><?php echo $dat['producto_vencimiento'] ?></td>
                        <td><?php echo $dat['producto_stock'] ?></td>


                        <td>
                            <?php if (intval($dat['producto_estado']) == 1) { ?>
                                <div class="alert alert-success" role="alert">
                                    Habilitado
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger" role="alert">
                                    Desabilitado
                                </div>
                            <?php } ?>
                        </td>

                        <!-- <td><button type="button" class="btn btn-success">Ver</button>&nbsp&nbsp<button type="button" class="btn btn-danger">Eliminar</button></td> -->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<?php
include_once "../../sidebar/footer.php"
?>
<script>
    $(document).ready(function() {
        $('#producto').DataTable();
    });
</script>
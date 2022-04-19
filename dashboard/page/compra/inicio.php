<?php
include_once "../../sidebar/sidebar.php";

$consulta = "SELECT * FROM cat_compra";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="./crearCompra.php" role="button">Crear Compra</a>
    </div>
    <div class="col col-12 ">
        <h4>Compra</h4>

        <table class="table">
            <thead>
                <tr>

                    <th>Codigo</th>
                    <th>usuario</th>
                    <th>Num Factura</th>
                    <th>Descripcion</th>
                    <th>Metodo Pago</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dat) {
                ?>
                    <tr>
                    <tr>
                        <td><?php echo $compra->compra_proveedor_id; ?></td>
                        <td><?php echo $compra->compra_usr_id; ?></td>
                        <td><?php echo $compra->compra_num_factura; ?></td>
                        <td><?php echo $compra->compra_descripcion; ?></td>
                        <td><?php echo $compra->compra_fecha_registro; ?></td>
                        <td><?php echo $compra->compra_fecha_entrega; ?></td>
                        <td><?php echo $compra->compra_subtotal; ?></td>
                        <td><?php echo $compra->compra_total; ?></td>


                        <td><button type="button" class="btn btn-success">Ver</button>&nbsp&nbsp<button type="button" class="btn btn-danger">Eliminar</button></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
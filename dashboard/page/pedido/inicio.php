<?php
include_once "../../sidebar/sidebar.php";

include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT * FROM cat_pedido";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="./crearPedido.php" role="button">Crear Pedido</a>
    </div>
    <div class="col col-12 table-responsive ">
        <table class="table">
            <h1 class="display-6 mb-4"> Listado de los Pedidos </h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Metodo Pago</th>
                    <th>Descripcion</th>
                    <th>Subtotal</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Entrega</th>
                    <th>Estado </th>


                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dat) {
                ?>
                    <tr>
                        <td><?php echo $dat['pedido_codigo '] ?></td>
                        <td><?php echo $dat['pedido_cliente_id '] ?></td>
                        <td><?php echo $dat['pedido_metodo_pago_id '] ?></td>
                        <td><?php echo $dat['pedido_descripcion	 '] ?></td>
                        <td><?php echo $dat['pedido_subtotal '] ?></td>
                        <td><?php echo $dat['pedido_fecha_registro'] ?></td>
                        <td><?php echo $dat['pedido_fecha_entrega '] ?></td>
                        <td><?php echo $dat['pedido_estado'] ?></td>

                        <td>
                            <?php if (intval($dat['pedido_estado']) == 1) { ?>
                                <div class="alert alert-success" role="alert">
                                    Activo
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-yellow" role="alert">
                                    Pendiente
                                </div>
                            <?php } ?>
                        </td>
                        <td><button type="button" class="btn btn-success">Ver</button>&nbsp&nbsp<button type="button" class="btn btn-danger">Eliminar</button></td>
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
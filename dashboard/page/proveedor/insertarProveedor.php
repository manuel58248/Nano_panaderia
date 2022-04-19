<?php
include_once "../../sidebar/sidebar.php";

$consulta = "SELECT * FROM cat_proveedor";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="./crearProveedor.php" role="button">Crear Proveedor</a>
    </div>
    <div class="col col-12 ">

        <table class="display" id="proveedor">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>correo</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dat) {
                ?>
                    <tr>
                        <td><?php echo $dat['proveed_codigo'] ?></td>
                        <td><?php echo $dat['proveed_nombre'] ?></td>
                        <td><?php echo $dat['proveed_correo'] ?></td>
                        <td><?php echo $dat['proveed_telefono'] ?></td>
                        <td>
                            <?php if (intval($dat['proveed_estado']) == 1) { ?>
                                <div class="alert alert-success" role="alert">
                                    Habilitado
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger" role="alert">
                                    Desabilitado
                                </div>
                            <?php } ?>
                        </td>
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
        $('#proveedor').DataTable();
    });
</script>
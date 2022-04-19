<?php
include_once "../../sidebar/sidebar.php";

include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT * FROM tbl_empleado";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="./crearEmpleado.php" role="button">Crear Empleado</a>
    </div>
    <div class="col col-12 table-responsive ">
        <table class="table">
            <h1 class="display-6 mb-4"> Listado de Empleados </h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Inss</th>
                    <th>Usuario</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dat) {
                ?>
                    <tr>
                        <td><?php echo $dat['empl_codigo'] ?></td>
                        <td><?php echo $dat['empl_inss'] ?></td>
                        <td><?php echo $dat['empl_usr_id '] ?></td>

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
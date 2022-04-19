<?php
include_once "../../sidebar/sidebar.php";

$consulta = "SELECT * FROM cat_usuario";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="./crearUsuario.php" role="button">Crear usuario</a>
    </div>
    <div class="col col-12 table-responsive ">
        <table class="table">
            <h1 class="display-6 mb-4"> Listado de usuario</h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dat) {
                ?>
                    <tr>
                        <td><?php echo $dat['usr_codigo'] ?></td>
                        <td><?php echo $dat['usr_email'] ?></td>
                        <td><?php echo $dat['usr_nombre'] ?></td>
                        <td>
                            <?php if (intval($dat['usr_estado']) == 1) { ?>
                                <div class="alert alert-success" role="alert">
                                    Habilitado
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger" role="alert">
                                    Desabilitado
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
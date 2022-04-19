<?php
include_once "../../sidebar/sidebar.php";

include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT * FROM cat_persona";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="./crearPersona.php" role="button">Crear Persona</a>
    </div>
    <div class="col col-12 table-responsive ">
        <table class="table">
            <h1 class="display-6 mb-4"> Listado de Persona</h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha de nacimiento</th>
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Telefono</th>
                    <th>Convencional</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dat) {
                ?>
                    <tr>
                        <td><?php echo $dat['persona_codigo'] ?></td>
                        <td><?php echo $dat['persona_fecha_nacimiento'] ?></td>
                        <td><?php echo $dat['persona_nombre'] ?></td>
                        <td><?php echo $dat['persona_genero'] ?></td>
                        <td><?php echo $dat['persona_movil'] ?></td>
                        <td><?php echo $dat['persona_convencional'] ?></td>
                        <td><?php echo $dat['persona_direccion'] ?></td>

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
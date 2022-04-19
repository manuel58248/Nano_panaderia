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

<div class="row">
    <div class="col col-6">
        <form action="" method="post" id="crearEmpleado">
            <div class="mb-2">
                <label class="form-label">INNS:</label>
                <input required type="text" class="form-control" name="empl_inss" id="empl_inss" aria-describedby="helpId" placeholder="Inss  ">
            </div>
            <div class="mb-2">
                <label for="empl_nombre" class="form-label">Nombre:</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Seleccione el Usuario</option>

                    <?php foreach ($data as $dat) { ?>
                        <option value="<?php echo $dat['usr_codigo'] ?>"><?php echo $dat['usr_nombre'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="mb-2">
                <label for="empl_cedula" class="form-label">Cedula:</label>
                <input required type="text" class="form-control" name="empl_cedula" id="empl_cedula" aria-describedby="helpId" placeholder="  ">
            </div>

            <div class="mb-2">
                <label for="empl_usuario_id" class="form-label">Usuario :</label>
                <select class="form-select" aria-label="Default select example" name="empl_usuario_id" id="empl_usuario_id">
                    <option selected>Seleccione un usuario</option>
                    <?php foreach ($usuarios as $usuario) { ?>
                        <?php print_r($usuarios) ?>
                        <option value="<?php echo $usuario->usr_codigo ?>"><?php echo $usuario->usr_nombre ?></option>
                    <?php } ?>
                </select>
                <div class="mb-2">
                    <label for="empl_cedula" class="form-label">Estado Civil:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Empleado</button>
            <a href="./inicio.php" class="btn btn-danger">Cancelar</a>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearEmpleado.js"></script>

<?php
include_once "../../sidebar/footer.php";
?>
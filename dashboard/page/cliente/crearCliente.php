<?php

include_once "../../sidebar/sidebar.php";
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$usar = "SELECT * FROM cat_usuario";
$pro = $conexion->prepare($usar);
$pro->execute();
$usuario = $pro->fetchAll(PDO::FETCH_ASSOC);
// print_r($usuario);

$perso = "SELECT * FROM cat_persona";
$pro = $conexion->prepare($perso);
$pro->execute();
$persona = $pro->fetchAll(PDO::FETCH_ASSOC);
// print_r($persona);

?>
<div class="row">
    <div class="col col-6">
        <form action="" method="post" id="crearCliente">

            <div class="mb-2">
                <label for="persona_fecha_nacimiento" class="form-label">Cedula:</label>
                <input required type="TEXT" class="form-control" name="clt_cedula_ruc" id="clt_cedula_ruc" aria-describedby="helpId" placeholder="Inss  ">
            </div>
            <div class="mb-2">

                <label for="empl_nombre" class="form-label">Usuarios</label>
                <select class="form-select" aria-label="Default select example" id="clt_usuario_id">
                    <option selected>Seleccione el usuario</option>

                    <?php foreach ($usuario as $dat) { ?>
                        <option value="<?php echo $dat['usr_codigo'] ?>"><?php echo $dat['usr_nombre'] ?></option>
                    <?php } ?>

                </select>

            </div>

            <div class="mb-2">

                <label for="empl_nombre" class="form-label">Persona</label>
                <select class="form-select" aria-label="Default select example" id="clt_persona_id">
                    <option selected>Seleccione el usuario</option>

                    <?php foreach ($persona as $dat) { ?>
                        <option value="<?php echo $dat['persona_codigo'] ?>"><?php echo $dat['persona_nombre'] ?></option>
                    <?php } ?>

                </select>

                <button type="submit" class="btn btn-primary">Agregar cliente</button>
                <a href="./inicio.php" class="btn btn-danger">Cancelar</a>
            </div>
    </div>
</div>
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearCliente.js"></script>

<?php
include_once "../../sidebar/footer.php"
?>
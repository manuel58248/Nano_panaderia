<?php
include_once "../../sidebar/sidebar.php";
?>

<div class="row">
    <div class="col col-6">
        <form action="" method="post" id="crearPersona">
            <div class="mb-2">
                <label for="persona_fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input required type="Date" class="form-control" name="persona_fecha_nacimiento" id="persona_fecha_nacimiento" aria-describedby="helpId" placeholder="Inss  ">
            </div>
            <div class="mb-2">
                <label for="persona_nombre" class="form-label">Nombre:</label>
                <input required type="text" class="form-control" name="persona_nombre" id="persona_nombre" aria-describedby="helpId" placeholder="Nombre del empleado  ">
            </div>
            <div class="mb-2">
                <label for="persona_genero" class="form-label">Genero:</label>
                <input required type="text" class="form-control" name="persona_genero" id="persona_genero" aria-describedby="helpId" placeholder="001-211101-211110D  ">
            </div>

            <div class="mb-2">
                <label for="persona_movil" class="form-label">Telefono:</label>
                <input required type="text" class="form-control" name="persona_movil" id="persona_movil" aria-describedby="helpId" placeholder="Nombre del empleado  ">
            </div>
            <div class="mb-2">
                <label for="persona_convencional" class="form-label">Convencional:</label>
                <input required type="text" class="form-control" name="persona_convencional" id="persona_convencional" aria-describedby="helpId" placeholder="001-211101-211110D  ">
            </div>
            <div class="mb-2">
                <label for="persona_direccion" class="form-label">Direccion:</label>
                <input required type="text" class="form-control" name="persona_direccion" id="persona_direccion" aria-describedby="helpId" placeholder="001-211101-211110D  ">
            </div>


            <button type="submit" class="btn btn-primary">Agregar Persona</button>
            <a href="./inicio.php" class="btn btn-danger">Cancelar</a>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearPersona.js"></script>

<?php
include_once "../../sidebar/footer.php";
?>
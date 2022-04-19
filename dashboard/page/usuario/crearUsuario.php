<?php
include_once "../../sidebar/sidebar.php";
?>

<div class="row">
    <div class="col col-6">
        <form action="" id= "crearUsuario" method="post">
            <h1 class="display-6 mb-4">Formulario de usuario</h1>
            <div class="mb-4">
                <label for="usr_email" class="form-label">Email:</label>
                <input required type="email" class="form-control" name="usr_email" id="email" aria-describedby="helpId" placeholder="Email">
            </div>
            <div class="mb-4">
                <label for="usr_nombre" class="form-label">Nombre:</label>
                <input required type="text" class="form-control" name="usr_nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-4">
                <label for="usr_clave" class="form-label">Clave:</label>
                <input required type="password" class="form-control" name="usr_clave" id="clave" aria-describedby="helpId" placeholder="Contrasena">
            </div>
            <button type="submit" class="btn btn-primary">Agregar usuario</button>
            <a href="./inicio.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearUsuario.js"></script>

<?php
include_once "../../sidebar/footer.php";
?>
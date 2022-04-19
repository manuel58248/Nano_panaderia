<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=usuario&accion=crear" role="button">Crear usuario</a>
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
                <?php foreach ($usuarios as  $usuario) { ?>
                    <tr>
                        <td> <?php echo $usuario->usr_codigo; ?></td>
                        <td> <?php echo $usuario->usr_email; ?></td>
                        <td> <?php echo  $usuario->usr_nombre; ?></td>
                        <td> <?php echo $usuario->usr_estado; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=usuario&accion=editar&usr_codigo=<?php echo $usuario->usr_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=usuario&accion=borrar&usr_codigo=<?php echo $usuario->usr_codigo; ?>" class="btn btn-danger ms-2">Borrar</a>
                                <a href="?controlador=usuario&accion=roles&usr_codigo=<?php echo $usuario->usr_codigo; ?>" class="btn btn-primary ms-2">Roles</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=rol&accion=crear" role="button">Crear Role</a>
    </div>
    <div class="col col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaRoles as  $Rol) { ?>
                    <tr>
                        <td><?php echo $Rol->rol_codigo; ?></td>
                        <td><?php echo $Rol->rol_nombre; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=Rol&accion=editar&rol_codigo=<?php echo $Rol->rol_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=Rol&accion=borrar&rol_codigo=<?php echo $Rol->rol_codigo; ?>" class="btn btn-danger">Borrar</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
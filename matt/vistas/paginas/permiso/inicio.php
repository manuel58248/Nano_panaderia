<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=permiso&accion=crear" role="button">Crear Permiso</a>
    </div>
    <div class="col col-12 ">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaPermisos as $Permiso) { ?>
                    <tr>
                        <td><?php echo $Permiso->perm_codigo; ?></td>
                        <td><?php echo $Permiso->perm_nombre; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=permiso&accion=editar&perm_codigo=<?php echo $Permiso->perm_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=permiso&accion=borrar&perm_codigo=<?php echo $Permiso->perm_codigo; ?>" class="btn btn-danger">Borrar</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
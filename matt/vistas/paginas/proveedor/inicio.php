<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=proveedor&accion=crear" role="button">Crear Proveedor</a>
    </div>
    <div class="col col-12 ">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaProveedor as  $proveedor) { ?>


                    <tr>
                        <td><?php echo $proveedor->proveed_codigo; ?></td>
                        <td><?php echo $proveedor->proveed_nombre; ?></td>
                        <td><?php echo $proveedor->proveed_telefono; ?></td>
                        <td><?php echo $proveedor->proveed_estado; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=proveedor&accion=editar&proveed_codigo=<?php echo $proveedor->proveed_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=proveedor&accion=borrar&proveed_codigo=<?php echo $proveedor->proveed_codigo; ?>" class="btn btn-danger">Borrar</a>

                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
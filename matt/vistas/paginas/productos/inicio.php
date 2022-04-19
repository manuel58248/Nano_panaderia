<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=productos&accion=crear" role="button">Crear Productos</a>
    </div>
    <div class="col col-12 ">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Clasificacion</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaProductos as  $Producto) { ?>


                    <tr>
                        <td><?php echo $Producto->producto_codigo; ?></td>
                        <td><?php echo $Producto->producto_nombre; ?></td>
                        <td><?php echo $Producto->producto_marca; ?></td>
                        <td><?php echo $Producto->producto_clasificacion; ?></td>
                        <td><?php echo $Producto->producto_estado; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=productos&accion=editar&producto_codigo=<?php echo $Producto->producto_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=productos&accion=borrar&producto_codigo=<?php echo $Producto->producto_codigo; ?>" class="btn btn-danger">Borrar</a>

                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
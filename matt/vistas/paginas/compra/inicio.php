<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=compra&accion=crear" role="button">Crear Compra</a>
    </div>
    <div class="col col-12 ">
        <h4>Productos</h4>


        <!-- <form action="" class="">
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg" placeholder="Ingrese el nombre del producto">
                <button type="submit" class="input-group-text btn-success"><i class="bi bi-search me-2"></i> Busqueda</button>
            </div>
        </form> -->
        <table class="table">
            <thead>
                <tr>

                    <th>Codigo</th>
                    <th>usuario</th>
                    <th>Num Factura</th>
                    <th>Descripcion</th>
                    <th>Metodo Pago</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaCompra as  $compra) { ?>


                    <tr>
                        <td><?php echo $compra->compra_codigo; ?></td>
                        <td><?php echo $compra->compra_usr_id; ?></td>
                        <td><?php echo $compra->compra_num_factura; ?></td>
                        <td><?php echo $compra->compra_descripcion; ?></td>
                        <td><?php echo $compra->compra_mp_id; ?></td>
                        <td><?php echo $compra->compra_subtotal; ?></td>
                        <td><?php echo $compra->compra_total; ?></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=compra&accion=editar&compra_codigo=<?php echo $compra->compra_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=compra&accion=borrar&compra_codigo=<?php echo $compra->compra_codigo; ?>" class="btn btn-danger">Borrar</a>

                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
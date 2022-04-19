<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=pago&accion=crear" role="button">Crear Metodo Pago</a>
    </div>
    <div class="col col-12 ">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaPago as  $pago) { ?>


                    <tr>
                        <td><?php echo $pago->mp_codigo; ?></td>
                        <td><?php echo $pago->mp_nombre; ?></td>
                        <td><?php echo $pago->mp_estado; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=pago&accion=editar&mp_codigo=<?php echo $pago->mp_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=pago&accion=borrar&mp_codigo=<?php echo $pago->mp_codigo; ?>" class="btn btn-danger">Borrar</a>

                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
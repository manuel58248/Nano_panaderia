<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=empleado&accion=crear" role="button">Crear Empleado</a>
    </div>
    <div class="col col-12 table-responsive ">
        <table class="table ">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Estado</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaEmpleados as  $empleado) { ?>

                    <tr>
                        <td> <?php echo $empleado->empl_codigo; ?></td>
                        <td> <?php echo  $empleado->empl_nombre; ?></td>
                        <td> <?php echo $empleado->empl_estado; ?></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=empleado&accion=editar&empl_codigo=<?php echo $empleado->empl_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=empleado&accion=borrar&empl_codigo=<?php echo $empleado->empl_codigo; ?>" class="btn btn-danger">Borrar</a>

                            </div>

                        </td>

                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
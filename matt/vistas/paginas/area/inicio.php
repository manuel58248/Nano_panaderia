<div class="row ">
    <div class="col col-3 offset-9 ">
    <a class="btn btn-primary" href="?controlador=area&accion=crear" role="button">Crear Area</a>
    </div>
    <div class="col col-12 ">
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
<?php foreach($listaArea as  $area) { ?> 

                    
                    <tr>
                        <td><?php echo $area->area_codigo; ?></td>
                        <td><?php echo $area->area_nombre; ?></td>
                        <td><?php echo $area->area_descripcion; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="?controlador=area&accion=editar&area_codigo=<?php echo $area->area_codigo; ?>" class="btn btn-dark">Editar</a>
                                <a href="?controlador=area&accion=borrar&area_codigo=<?php echo $area->area_codigo; ?>" class="btn btn-danger">Borrar</a>

                            </div>

                        </td>
                    </tr>
                <?php } ?>    
            </tbody>
        </table>
    </div>
</div>
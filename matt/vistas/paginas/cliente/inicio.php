<div class="row ">
    <div class="col col-3 offset-9 ">
        <a class="btn btn-primary" href="?controlador=cliente&accion=crear" role="button">Crear Cliente</a>
    </div>
    <div class="col col-12 ">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaCliente as $cliente) { ?>
                    <tr>
                        <td> <?php echo $usuario->clt_codigo; ?></td>
                        <td><?php echo $cliente->clt_cedula_ruc; ?></td>
                        <td><?php echo $cliente->clt_nombre; ?></td>
                        <td><?php echo $cliente->clt_telefono; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
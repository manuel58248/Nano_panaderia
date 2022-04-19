<div class="row">

    <div class="col col-6">

        <form action="" method="post">




            <label for="compra_proveedor_id" class="form-label">Proveedor:</label>
            <select class="form-select" aria-label="Default select example" name="compra_proveedor_id" id="compra_proveedor_id">
                <option selected>Seleccione un Proveedor</option>
                <?php foreach ($proveedorr as  $proveedor) { ?>
                    <?php print_r($proveedorr) ?>
                    <option value="<?php echo $proveedor->proveed_codigo ?>"><?php echo $proveedor->proveed_nombre; ?></option>
                <?php } ?>
            </select>

            <div class=" mb-2">
                <label for="compra_usr_id" class="form-label">Usuario:</label>
                <select class="form-select" aria-label="Default select example" name="compra_usr_id" id="compra_usr_id">
                    <option selected>Seleccione un usuario</option>
                    <?php foreach ($usuarios as $usuario) { ?>
                        <?php print_r($usuarios) ?>
                        <option value="<?php echo $usuario->usr_codigo ?>"><?php echo $usuario->usr_nombre; ?></option>
                    <?php } ?>
                </select>

                <div class="mb-4">
                    <label for="nombre" class="form-label">Num Factura:</label>
                    <input required type="text" class="form-control" name="compra_num_factura" id="" aria-describedby="helpId" placeholder="">

                </div>

                <div class="mb-2">
                    <label for="compra_descripcion" class="form-label">Descripcion:</label>
                    <input required type="text" class="form-control" name="compra_descripcion" id="compra_descripcion" aria-describedby="helpId" placeholder="  ">

                </div>
                <div class="mb-2">
                    <label for="compra_subtotal" class="form-label">SubTotal</label>
                    <input required type="text" class="form-control" name="compra_subtotal" id="compra_subtotal" aria-describedby="helpId" placeholder="    ">

                </div>
                <div class="mb-2">
                    <label for="compra_descuento" class="form-label">Descuento:</label>
                    <input required type="text" class="form-control" name="compra_descuento" id="compra_descuento" aria-describedby="helpId" placeholder=" ">

                </div>
                <div class="mb-2">
                    <label for="compra_total" class="form-label">Total:</label>
                    <input required type="text" class="form-control" name="compra_total" id="compra_total" aria-describedby="helpId" placeholder=" ">

                </div>
                <div class=" mb-2">
                    <label for="empl_usuario_id" class="form-label">Metodo Pago:</label>
                    <select class="form-select" aria-label="Default select example" name="compra_mp_id" id="compra_mp_id">
                        <option selected>Seleccione un Metodo de Pago</option>
                        <?php foreach ($pagoo as $pago) { ?>
                            <?php print_r($pagoo) ?>
                            <option value="<?php echo $pago->mp_codigo; ?>"><?php echo $pago->mp_nombre ?></option>
                        <?php } ?>
                    </select>

                    <div class="mb-2">
                        <label for="compra_fecha_registro" class="form-label">Fecha Registro:</label>
                        <input required type="date" class="form-control" name="compra_fecha_registro" id="compra_fecha_registro" aria-describedby="helpId" placeholder=" ">

                    </div>



                    <input name="" id="" class="btn btn-success" type="Submit" value="Realizar Compra">


        </form>
    </div>
</div>
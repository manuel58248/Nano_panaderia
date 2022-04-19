<?php
include_once "../../sidebar/sidebar.php";


include_once '../../bd/conexion.php';
$objeto = new Conexion();

$produc = "SELECT * FROM cat_producto";
$pro = $conexion->prepare($produc);
$pro->execute();
$producto = $pro->fetchAll(PDO::FETCH_ASSOC);

$consulta = "SELECT * FROM tbl_cliente";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$cliente = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Facturacion</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <div class="row invoice-info">
                                <div class="col-sm-2 invoice-col">
                                    <b id="invoiceable"></b><br>
                                </div>

                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label>Clientes existentes</label>
                                            <select class="form-select" aria-label="Default select example" id="clt_usuario_id ">
                                                <option selected>Seleccione el cliente</option>
                                                <?php foreach ($cliente as $dat) { ?>
                                                    <option value="<?php echo $dat['clt_usuario_id'] ?>">
                                                        <?php echo $dat['clt_persona_id'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            &nbsp&nbsp&nbsp
                            &nbsp
                            &nbsp
                            <div class="card">
                                <div class="card-header">
                                    Añadir Producto
                                </div>
                                <div class="card-body">

                                    <div class="row invoice-info">
                                        <div class="col-sm-2">
                                            <div class="col">
                                                <label>Cantidad</label>
                                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="2">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <label>Productos</label>
                                            <select class="form-control select2" id="prodi" style="width: 100%;">
                                                <option selected="selected">-- Seleccione --</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="col">
                                                <label>Precio Sugerido</label>
                                                <input type="number" class="form-control" id="precioUnidad" name="precioUnidad" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="col">
                                                <label>SubTotal</label>
                                                <input type="number" class="form-control" id="Subtotal" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-2.2 ">
                                            <button type="button" onclick="añadircarrito()" class="btn btn-warning float-right"><i class="far fa-credit-card"></i>
                                                Añadir Producto</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">Productos</div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped" id="tabl">
                                            <thead>
                                                <tr>
                                                    <th hidden>Iddeproductos</th>
                                                    <th>Cantidades</th>
                                                    <th>Producto</th>
                                                    <th>Precio</th>
                                                    <th>Monto</th>
                                                    <th hidden>preciouni</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <!-- Cuerpo de la Tabla -->
                                            <tbody id="tablita" name="tablita">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <div class="col-4">
                                    <label>Monto</label>
                                    <input type="number" class="form-control" id="monto" name="monto" placeholder="C$: 100">
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Detalles del Pago</p>

                                <div class="table-responsive">
                                    <table class="table" id="tblsubtotal">
                                        <tr>
                                            <th style="width:50%" id='subtotal' class="subtotal">Subtotal:</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th style="width:50%" id='subtotal' class="subtotal">Iva:</th>
                                            <td></td>
                                        </tr>
                                        <tr id='total' class="total">
                                            <th>Total:</th>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="button" onclick="facturar()" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Guardar Factura e Imprimir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="JS/Facturar.js"></script>

    <?php
    include_once "../../sidebar/footer.php";
    ?>
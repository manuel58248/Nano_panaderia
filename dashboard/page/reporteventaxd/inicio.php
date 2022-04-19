<?php
include_once "../../sidebar/sidebar.php";

// include_once '../../bd/conexion.php';
// $objeto = new Conexion();
// $conexion = $objeto->Conectar();
//  $consulta = "SELECT * FROM cat_usuario";
// $resultado = $conexion->prepare($consulta);
// $resultado->execute();
// $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
// 
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Facturacion de venta
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID:
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div>
    </div>

    <!-- <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">Bootdey.com</span>
                        </div>
                    </div>
                </div> -->
    <!-- .row -->

    <hr class="row brc-default-l1 mx-n1 mb-4" />

    <div class="row">
        <div class="col-sm-6">
            <div>
                <span class="text-sm text-grey-m2 align-middle">To:</span>
                <span class="text-600 text-110 text-blue align-middle"></span>
            </div>

        </div>

        <!-- /.col -->
    </div>

    <div class="mt-4">
        <div class="row text-600 text-white bgc-default-tp1 py-25">
            <div class="d-none d-sm-block col-1">ID</div>
            <div class="col-9 col-sm-5">Nombre</div>
            <div class="d-none d-sm-block col-4 col-sm-2">Cantidad</div>
            <div class="d-none d-sm-block col-sm-2">Precio</div>

            <div class="col-2">Precio</div>
        </div>

        <div class="text-95 text-secondary-d3">
            <div class="row mb-2 mb-sm-0 py-25">
                <div class="d-none d-sm-block col-1">1</div>
                <div class="col-9 col-sm-5">Domain registration</div>
                <div class="d-none d-sm-block col-2">2</div>
                <div class="d-none d-sm-block col-2 text-95">$10</div>
                <div class="col-2 text-secondary-d2">$20</div>
            </div>


            <div class="row border-b-2 brc-default-l2"></div>


            <div class="row mt-3">
                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                    Revise bien antes de facturar
                </div>

                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                    <div class="row my-3">
                        <div class="col-7 text-right">
                            SubTotal
                        </div>
                        <div class="col-5">
                            <span class="text-120 text-secondary-d1">$1</span>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-7 text-right">
                            Tax (10%)
                        </div>
                        <div class="col-5">
                            <span class="text-110 text-secondary-d1">$2</span>
                        </div>
                    </div>

                    <div class="row my-3 align-items-center bgc-primary-l3 p-2">
                        <div class="col-7 text-right">
                            Total a Pagar
                        </div>
                        <div class="col-5">
                            <span class="text-150 text-success-d3 opacity-2">$3</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <div>

                <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pagar Ahora</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
include_once "../../sidebar/footer.php"
?>
<script>
    $(document).ready(function() {
        $('#venta').DataTable();
    });
</script>
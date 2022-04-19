<?php
include_once "../../sidebar/sidebar.php";
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// $consulta = "SELECT * FROM cat_producto";
// $resultado = $conexion->prepare($consulta);
// $resultado->execute();
// $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

$produc = "SELECT * FROM cat_producto";
$pro = $conexion->prepare($produc);
$pro->execute();
$producto = $pro->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="row">

    <div class="col col-6">

        <div class="mb-2">
            <label class="form-label">Nombre</label>
            <input required type="text" class="form-control" name="formula_nombre" id="formula_nombre" aria-describedby="helpId" placeholder="Nombre">
        </div>

        <div class="mb-2">
            <label class="form-label">Descripcion:</label>
            <input required type="text" class="form-control" name="formula_descripcion" id="formula_descripcion" aria-describedby="helpId" placeholder="Descripcion  ">

        </div>
        <div class="mb-2">

            <label for="empl_nombre" class="form-label">Producto</label>
            <select class="form-select" aria-label="Default select example" id="pro">
                <option selected>Seleccione el producto</option>

                <?php foreach ($producto as $dat) { ?>
                    <option value="<?php echo $dat['producto_codigo'] ?>">
                        <?php echo $dat['producto_nombre'] ?></option>
                <?php } ?>

            </select>

        </div>

        <div class="mb-2">
            <label for="formula_descripcion" class="form-label">Cantidad:</label>
            <input required type="text" class="form-control" name="cant" id="cant" aria-describedby="helpId" placeholder="Cantidad">
        </div>

        <div class="mb-2 d-grid gap-2">
            <button type="button" onclick="agregarProducto()" class="btn btn-primary">Agregar</button>
        </div>

        <table class="table table-striped" id="tabl">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Cantidades</th>
                </tr>
            </thead>
            <tbody id="tablita" name="tablita">

            </tbody>
        </table>

        <button type="button" onclick="guardarFormula()" class="btn btn-primary">Agregar Formula</button>
        <a href="./inicio.php" class="btn btn-danger">Cancelar</a>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/crearFormula.js"></script>

<?php
include_once "../../sidebar/footer.php"
?>
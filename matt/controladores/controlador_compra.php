<?php
include_once("./modelos/compra.php");
include_once("./modelos/usuario.php");
include_once("./modelos/pago.php");
include_once("./modelos/proveedor.php");
include_once("./modelos/productos.php");

class ControladorCompra

{

    public function inicio()

    {


        $listaCompra = Compra::inicio();
        // print_r($listaCompra);
        include_once("./vistas/paginas/compra/inicio.php");
    }

    public function crear()
    {
        $usuarios = Usuario::inicio();
        $pagoo = Pago::inicio();
        $proveedorr = Proveedor::inicio();
        $Producto = Producto::inicio();
        $compra = Compra::inicio();
        try {

            if ($_POST) {


                $compra_proveedor_id = $_POST['compra_proveedor_id'];
                $compra_usr_id = $_POST['compra_usr_id'];
                $compra_num_factura = $_POST['compra_num_factura'];
                $compra_descripcion = $_POST['compra_descripcion'];
                $compra_subtotal = $_POST['compra_subtotal'];
                $compra_descuento = $_POST['compra_descuento'];
                $compra_total = $_POST['compra_total'];
                $compra_mp_id = $_POST['compra_mp_id'];
                $compra_fecha_registro = $_POST['compra_fecha_registro'];

                Compra::crear(
                    $compra_proveedor_id,
                    $compra_usr_id,
                    $compra_num_factura,
                    $compra_descripcion,
                    $compra_subtotal,
                    $compra_descuento,
                    $compra_total,
                    $compra_mp_id,
                    $compra_fecha_registro

                );
                header("Location:./?controlador=compra&accion=inicio");
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

        include_once("./vistas/paginas/compra/crear.php");
    }

    public function editar()

    {
        try {
            $usuarios = Usuario::inicio();
            $pago = Pago::inicio();
            $proveedor = Proveedor::inicio();
            $producto = Producto::inicio();
            if ($_POST) {
                $compra_codigo = $_POST['compra_codigo'];
                $compra_proveedor_id = $_POST['compra_proveedor_id'];
                $compra_usr_id = $_POST['compra_usr_id'];
                $compra_num_factura = $_POST['compra_num_factura'];
                $compra_descripcion = $_POST['compra_descripcion'];
                $compra_subtotal = $_POST['compra_subtotal'];
                $compra_descuento = $_POST['compra_descuento'];
                $compra_total = $_POST['compra_total'];
                $compra_mp_id = $_POST['compra_mp_id'];
                $compra_fecha_registro = $_POST['compra_fecha_registro'];
                $compra_estado = $_POST['compra_estado'];

                print_r($_POST);
                Compra::editar($compra_codigo, $compra_proveedor_id, $compra_usr_id, $compra_num_factura, $compra_descripcion, $compra_subtotal, $compra_descuento, $compra_total, $compra_mp_id, $compra_fecha_registro, $compra_estado);


                header("location:./?controlador=compra&accion=inicio");
            }
            $compra_codigo = $_GET['compra_codigo'];

            $compra = (Compra::buscar($compra_codigo));
            include_once("vistas/paginas/compra/editar.php");
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function borrar()
    {
        print_r($_POST);

        $compra_codigo = $_GET['compra_codigo'];

        Compra::borrar($compra_codigo);

        header("location:./?controlador=compra&accion=inicio");
    }
}

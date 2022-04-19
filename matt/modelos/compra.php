<?php
include_once("./conexion.php");

class Compra
{
    public $compra_codigo;
    public $compra_proveedor_id;
    public $compra_usr_id;
    public $compra_num_factura;
    public $compra_descripcion;
    public $compra_subtotal;
    public $compra_descuento;
    public $compra_total;
    public $compra_mp_id;
    public $compra_fecha_registro;
    public $compra_estado;

    public function __construct(
        $compra_codigo,
        $compra_proveedor_id,
        $compra_usr_id,
        $compra_num_factura,
        $compra_descripcion,
        $compra_subtotal,
        $compra_descuento,
        $compra_total,
        $compra_mp_id,
        $compra_fecha_registro,
        $compra_estado
    ) {
        $this->compra_codigo = $compra_codigo;
        $this->compra_proveedor_id = $compra_proveedor_id;
        $this->compra_num_factura = $compra_num_factura;
        $this->compra_usr_id = $compra_usr_id;
        $this->compra_descripcion = $compra_descripcion;
        $this->compra_subtotal = $compra_subtotal;
        $this->compra_descuento = $compra_descuento;
        $this->compra_total = $compra_total;
        $this->compra_mp_id = $compra_mp_id;
        $this->compra_fecha_registro = $compra_fecha_registro;
        $this->compra_estado = $compra_estado;
    }

    public static function inicio()
    {
        try {
            $listaCompra = [];

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM cat_compra");

            foreach ($sql->fetchAll() as $compra) {

                $listaCompra[] = new Compra(
                    $compra['compra_codigo'],
                    $compra['compra_proveedor_id'],
                    $compra['compra_num_factura'],
                    $compra['compra_usr_id'],
                    $compra['compra_descripcion'],
                    $compra['compra_subtotal'],
                    $compra['compra_descuento'],
                    $compra['compra_total'],
                    $compra['compra_mp_id'],
                    $compra['compra_fecha_registro'],
                    $compra['compra_estado']
                );
            }

            return $listaCompra;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }


    public static function crear(
        $compra_proveedor_id,
        $compra_usr_id,
        $compra_num_factura,
        $compra_descripcion,
        $compra_subtotal,
        $compra_descuento,
        $compra_total,
        $compra_mp_id,
        $compra_fecha_registro
    ) {


        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("INSERT INTO cat_compra(compra_proveedor_id,compra_usr_id,compra_num_factura,
         compra_descripcion,compra_subtotal,compra_descuento,compra_total,compra_mp_id,compra_fecha_registro,compra_estado) VALUES (?,?,?,?,?,?,?,?,?,?)");

        $sql->execute(array(
            $compra_proveedor_id,
            $compra_usr_id,
            $compra_num_factura,
            $compra_descripcion,
            $compra_subtotal,
            $compra_descuento,
            $compra_total,
            $compra_mp_id,
            $compra_fecha_registro,
            'activo'
        ));
    }
    public static function borrar($compra_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cat_compra WHERE compra_codigo=? ");
        $sql->execute(array($compra_codigo));
    }
    public static function buscar($compra_codigo)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cat_compra WHERE compra_codigo=?");
        $sql->execute(array($compra_codigo));
        $compra = $sql->fetch();
        return new Compra($compra['compra_codigo'], $compra['compra_proveedor_id'], $compra['compra_usr_id'], $compra['compra_num_factura'], $compra['compra_descripcion'], $compra['compra_subtotal'], $compra['compra_descuento'], $compra['compra_total'], $compra['compra_mp_id'], $compra['compra_fecha_registro'], $compra['compra_estado']);
    }
    public static function editar(
        $compra_codigo,
        $compra_proveedor_id,
        $compra_usr_id,
        $compra_num_factura,
        $compra_descripcion,
        $compra_subtotal,
        $compra_descuento,
        $compra_total,
        $compra_mp_id,
        $compra_fecha_registro,
        $compra_estado
    ) {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("UPDATE cat_compra SET compra_proveedor_id=?, compra_usr_id=?,compra_num_factura=?,compra_descripcion=?,compra_subtotal=?,compra_descuento=?, compra_total=?, compra_mp_id=?,compra_fecha_registro=? ,compra_estado=? WHERE compra_codigo=? ");
        $sql->execute(array(
            $compra_codigo,
            $compra_proveedor_id,
            $compra_usr_id,
            $compra_num_factura,
            $compra_descripcion,
            $compra_subtotal,
            $compra_descuento,
            $compra_total,
            $compra_mp_id,
            $compra_fecha_registro,
            $compra_estado
        ));
    }
}

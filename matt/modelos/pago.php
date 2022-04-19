<?php
include_once("./conexion.php");

class Pago
{
    public $mp_codigo;
    public $mp_nombre;
    public $mp_estado;

    public function __construct($mp_codigo, $mp_nombre, $mp_estado)
    {
        $this->mp_codigo = $mp_codigo;
        $this->mp_nombre = $mp_nombre;
        $this->mp_estado = $mp_estado;
    }

    public static function inicio()
    {
        try {
            $listaPago = [];

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM cat_metodo_pago");

            foreach ($sql->fetchAll() as $pago) {

                $listaPago[] = new Pago($pago['mp_codigo'], $pago['mp_nombre'], $pago['mp_estado']);
            }

            return $listaPago;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }


    public static function crear($mp_nombre)
    {


        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("INSERT INTO cat_metodo_pago(mp_nombre,mp_estado ) VALUES (?,?)");

        $sql->execute(array($mp_nombre, 'activo'));
    }
    public static function borrar($mp_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cat_metodo_pago WHERE mp_codigo=? ");
        $sql->execute(array($mp_codigo));
    }
    public static function buscar($mp_codigo)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cat_metodo_pago WHERE mp_codigo=?");
        $sql->execute(array($mp_codigo));
        $pago = $sql->fetch();
        return new Pago($pago['mp_codigo'], $pago['mp_nombre'], $pago['mp_estado']);
    }
    public static function editar($mp_nombre, $mp_estado)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("UPDATE cat_metodo_pago SET mp_nombre=?, mp_estado=?  WHERE mp_codigo=? ");
        $sql->execute(array($mp_nombre, $mp_estado));
    }
}

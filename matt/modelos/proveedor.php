<?php
include_once("./conexion.php");

class Proveedor
{
    public $proveed_codigo;
    public $proveed_nombre;
    public $proveed_telefono;
    public $proveed_correo;
    public $proveed_estado;

    public function __construct($proveed_codigo, $proveed_nombre, $proveed_telefono, $proveed_correo, $proveed_estado)
    {
        $this->proveed_codigo = $proveed_codigo;
        $this->proveed_nombre = $proveed_nombre;
        $this->proveed_telefono = $proveed_telefono;
        $this->proveed_correo = $proveed_correo;
        $this->proveed_estado = $proveed_estado;
    }

    public static function inicio()
    {
        try {
            $listaProveedor = [];

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM cat_proveedor");

            foreach ($sql->fetchAll() as $proveedor) {

                $listaProveedor[] = new Proveedor($proveedor['proveed_codigo'], $proveedor['proveed_nombre'], $proveedor['proveed_telefono'], $proveedor['proveed_correo'], $proveedor['proveed_estado']);
            }

            return $listaProveedor;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }


    public static function crear($proveed_nombre, $proveed_telefono, $proveed_correo, $proveed_estado)
    {


        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("INSERT INTO cat_proveedor(proveed_nombre,proveed_telefono, proveed_correo,proveed_estado) VALUES (?,?,?,?)");

        $sql->execute(array($proveed_nombre, $proveed_telefono, $proveed_correo, 'activo'));
    }
    public static function borrar($proveed_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cat_proveedor WHERE proveed_codigo=? ");
        $sql->execute(array($proveed_codigo));
    }
    public static function buscar($proveed_codigo)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cat_proveedor WHERE proveed_codigo=?");
        $sql->execute(array($proveed_codigo));
        $proveedor = $sql->fetch();
        return new Proveedor($proveedor['proveed_codigo'], $proveedor['proveed_nombre'], $proveedor['proveed_telefono'], $proveedor['proveed_correo'], $proveedor['proveed_estado']);
    }
    public static function editar($proveed_codigo, $proveed_nombre, $proveed_telefono, $proveed_correo, $proveed_estado)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("UPDATE cat_proveedor SET proveed_nombre=?,proveed_telefono=?,proveed_correo=?,proveed_estado=?   WHERE proveed_codigo=? ");
        $sql->execute(array($proveed_nombre, $proveed_telefono, $proveed_correo, $proveed_estado, $proveed_codigo));
    }
}

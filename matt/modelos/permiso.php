<?php
include_once("./conexion.php");

class Permiso
{
    public $perm_codigo;
    public $perm_nombre;
    public $perm_estado;


    public function __construct($perm_codigo, $perm_nombre, $perm_estado)
    {
        $this->perm_codigo = $perm_codigo;
        $this->perm_nombre = $perm_nombre;
        $this->perm_estado = $perm_estado;
    }

    public static function inicio()
    {
        try {
            $listaPermiso = [];

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM cat_permiso");

            foreach ($sql->fetchAll() as $Permiso) {

                $listaPermiso[] = new Permiso($Permiso['perm_codigo'], $Permiso['perm_nombre'], $Permiso['perm_estado']);
            }

            return $listaPermiso;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }

    public static function crear($perm_nombre)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("INSERT INTO cat_permiso(perm_nombre, perm_estado) VALUES (?,?)");
        $sql->execute(array($perm_nombre, 'activo'));
    }

    public static function borrar($perm_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cat_permiso WHERE perm_codigo=? ");
        $sql->execute(array($perm_codigo));
    }

    public static function buscar($perm_codigo)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cat_permiso WHERE rol_codigo=?");
        $sql->execute(array($perm_codigo));
        $Rol = $sql->fetch();
        return new Rol($Rol['rol_codigo'], $Rol['rol_nombre']);
    }

    public static function editar($perm_codigo)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("UPDATE cat_permiso SET rol_nombre=?  WHERE perm_codigo=? ");
        $sql->execute(array($perm_codigo));
    }
}

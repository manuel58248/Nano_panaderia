<?php
include_once("./conexion.php");

class RolPermiso
{
    public $rp_codigo;
    public $rp_rol;
    public $rp_permiso;


    public function __construct($rp_codigo, $rp_rol, $rp_permiso)
    {
        $this->rol_codigo = $rp_codigo;
        $this->rol_nombre = $rp_rol;
        $this->rp_permiso = $rp_permiso;
    }

    public static function inicio()
    {
        try {
            $listaRol_permiso = [];

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM cat_rol");

            foreach ($sql->fetchAll() as $rol_permis) {

                $listaRol_permiso[] = new RolPermiso($rol_permis['rp_codigo'], $rol_permis['rol_nombre'], $rol_permis['rp_permiso']);
            }

            return $listaRol_permiso;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }


    // public static function crear($rol_codigo)
    // {


    //     $conexionBD = BaseDeDatos::obtenerInstancia();
    //     $sql = $conexionBD->prepare("INSERT INTO cat_rol(rol_nombre ) VALUES (?)");
    //     $sql->execute(array($rol_codigo));
    // }
    // public static function borrar($rol_codigo)
    // {
    //     $conexionBD = BaseDeDatos::obtenerInstancia();
    //     $sql = $conexionBD->prepare("DELETE FROM cat_rol WHERE rol_codigo=? ");
    //     $sql->execute(array($rol_codigo));
    // }
    // public static function buscar($rol_codigo)
    // {

    //     $conexionBD = BaseDeDatos::obtenerInstancia();
    //     $sql = $conexionBD->prepare("SELECT * FROM cat_rol WHERE rol_codigo=?");
    //     $sql->execute(array($rol_codigo));
    //     $Rol = $sql->fetch();
    //     return new Rol($Rol['rol_codigo'], $Rol['rol_nombre']);
    // }
    // public static function editar($rol_codigo)
    // {

    //     $conexionBD = BaseDeDatos::obtenerInstancia();
    //     $sql = $conexionBD->prepare("UPDATE cat_rol SET rol_nombre=?  WHERE rol_codigo=? ");
    //     $sql->execute(array($rol_codigo));
    // }
}

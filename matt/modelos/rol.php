<?php
include_once("./conexion.php");

class Rol
{
    public $rol_codigo;
    public $rol_nombre;

    public function __construct($rol_codigo, $rol_nombre)
    {
        $this->rol_codigo = $rol_codigo;
        $this->rol_nombre = $rol_nombre;
    }

    public static function inicio()
    {
        try {
            $listaRol = [];

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM cat_rol");

            foreach ($sql->fetchAll() as $Rol) {

                $listaRol[] = new Rol($Rol['rol_codigo'], $Rol['rol_nombre']);
            }

            return $listaRol;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }


    public static function crear($rol_nombre)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("INSERT INTO cat_rol(rol_nombre) VALUES (?)");
        $sql->execute(array($rol_nombre));
    }

    public static function borrar($rol_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cat_rol WHERE rol_codigo=? ");
        $sql->execute(array($rol_codigo));
    }

    public static function buscar($rol_codigo)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cat_rol WHERE rol_codigo=?");
        $sql->execute(array($rol_codigo));
        $Rol = $sql->fetch();
        return new Rol($Rol['rol_codigo'], $Rol['rol_nombre']);
    }

    public static function editar($rol_codigo, $rol_nombre)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("UPDATE cat_rol SET rol_nombre=?  WHERE rol_codigo=?");
        $sql->execute(array($rol_nombre, $rol_codigo));
    }
}

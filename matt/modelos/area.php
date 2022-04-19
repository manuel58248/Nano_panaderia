<?php
include_once("./conexion.php");

class Area
{
    public $area_codigo;
    public $area_nombre;
    public $area_descripcion;

    public function __construct($area_codigo, $area_nombre, $area_descripcion)
    {
        $this->area_codigo = $area_codigo;
        $this->area_nombre = $area_nombre;
        $this->area_descripcion = $area_descripcion;
    }

    public static function inicio()
    {
        try {
            $listaArea = [];

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM cat_area");

            foreach ($sql->fetchAll() as $area) {

                $listaArea[] = new Area($area['area_codigo'], $area['area_nombre'], $area['area_descripcion']);
            }

            return $listaArea;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }


    public static function crear($area_nombre, $area_descripcion)
    {


        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("INSERT INTO cat_area(area_nombre,area_descripcion ) VALUES (?,?)");

        $sql->execute(array($area_nombre, $area_descripcion));
    }
    public static function borrar($area_codigo){
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql= $conexionBD->prepare("DELETE FROM cat_area WHERE area_codigo=? ");
        $sql->execute(array($area_codigo));
    }
    public static function buscar ($area_codigo){

        $conexionBD=BaseDeDatos:: obtenerInstancia();
        $sql= $conexionBD->prepare("SELECT * FROM cat_area WHERE area_codigo=?");
        $sql->execute(array($area_codigo));
        $area=$sql->fetch();
        return new Area($area['area_codigo'], $area['area_nombre'], $area['area_descripcion']);
    }
    public static function editar($area_codigo,$area_nombre,$area_descripcion){

        $conexionBD=BaseDeDatos:: obtenerInstancia();
        $sql= $conexionBD->prepare("UPDATE cat_area SET area_nombre=?, area_descripcion=?  WHERE area_codigo=? ");
        $sql->execute(array($area_nombre,$area_descripcion,$area_codigo));

    }


}

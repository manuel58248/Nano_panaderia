<?php
include_once("./conexion.php");

class Empleado
{

    public $empl_codigo;
    public $empl_inss;
    public $empl_nombre;
    public $empl_cedula;
    public $empl_telefono;
    public $empl_estado_civil;
    public $empl_direccion;
    public $empl_fecha_nacimiento;
    public $empl_genero;
    public $empl_estado;
    public $empl_usuario_id;

    public function __construct($empl_codigo, $empl_inss, $empl_nombre, $empl_cedula, $empl_telefono, $empl_estado_civil, $empl_direccion, $empl_fecha_nacimiento, $empl_genero, $empl_estado, $empl_usuario_id)
    {
        $this->empl_codigo = $empl_codigo;
        $this->empl_inss = $empl_inss;
        $this->empl_nombre = $empl_nombre;
        $this->empl_cedula = $empl_cedula;
        $this->empl_telefono = $empl_telefono;
        $this->empl_direccion = $empl_direccion;
        $this->empl_estado_civil =  $empl_estado_civil;
        $this->empl_fecha_nacimiento = $empl_fecha_nacimiento;
        $this->empl_genero = $empl_genero;
        $this->empl_estado = $empl_estado;
        $this->empl_usuario_id = $empl_usuario_id;
    }

    public static function inicio()
    {

        try {
            $listaEmpleados = [];

            print_r($listaEmpleados);
            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM tbl_empleado");

            foreach ($sql->fetchAll() as $empleado) {
                $listaEmpleados[] = new Empleado(
                    $empleado['empl_codigo'],
                    $empleado['empl_inss'],
                    $empleado['empl_nombre'],
                    $empleado['empl_cedula'],
                    $empleado['empl_telefono'],
                    $empleado['empl_estado_civil'],
                    $empleado['empl_direccion'],
                    $empleado['empl_fecha_nacimiento'],
                    $empleado['empl_genero'],
                    $empleado['empl_estado'],
                    $empleado['empl_usuario_id']
                );
            }
            return $listaEmpleados;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public static function crear($empl_inss, $empl_nombre, $empl_cedula, $empl_telefono, $empl_estado_civil, $empl_direccion, $empl_fecha_nacimiento, $empl_genero, $empl_usuario_id)
    {
        try {
            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->prepare("INSERT INTO tbl_empleado(empl_inss, empl_nombre, empl_cedula, empl_telefono, empl_estado_civil,
            empl_direccion, empl_fecha_nacimiento, empl_genero, empl_usuario_id, empl_estado) VALUES (?,?,?,?,?,?,?,?,?,?)");

            $sql->execute(array($empl_inss, $empl_nombre, $empl_cedula, $empl_telefono, $empl_estado_civil, $empl_direccion, $empl_fecha_nacimiento, $empl_genero, $empl_usuario_id, 'activo'));
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public static function borrar($empl_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("DELETE FROM tbl_empleado WHERE empl_codigo=?");
        $sql->execute(array($empl_codigo));
    }

    public static function buscar($empl_codigo)
    {
        try {
            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->prepare("SELECT * FROM tbl_empleado WHERE empl_codigo=?");
            $sql->execute(array($empl_codigo));
            $empleado = $sql->fetch();
            return new Empleado($empleado['empl_codigo'], $empleado['empl_inss'], $empleado['empl_nombre'], $empleado['empl_cedula'], $empleado['empl_telefono'], $empleado['empl_estado_civil'], $empleado['empl_direccion'], $empleado['empl_fecha_nacimiento'], $empleado['empl_genero'], $empleado['empl_estado'], $empleado['empl_usuario_id']);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public static function editar($empl_codigo, $empl_inss, $empl_nombre, $empl_cedula, $empl_telefono, $empl_estado_civil, $empl_direccion, $empl_fecha_nacimiento, $empl_genero, $empl_estado, $empl_usuario_id)
    {

        try {

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = "UPDATE tbl_empleado SET empl_inss = :empl_inss,
            empl_codigo=:empl_codigo, 
            empl_nombre = :empl_nombre, 
            empl_cedula = :empl_cedula,
            empl_telefono = :empl_telefono,
            empl_estado_civil = :empl_estado_civil,
            empl_direccion = :empl_direccion,
            empl_estado_civil = :empl_estado_civil,
            empl_fecha_nacimiento=:empl_fecha_nacimiento,
            empl_genero=:empl_genero,
            empl_estado=:empl_estado,
            empl_usuario_id=:empl_usuario_id
            WHERE empl_codigo = :empl_codigo";
            $stmt = $conexionBD->prepare($sql);
            $stmt->bindParam(':empl_codigo', $empl_codigo, PDO::PARAM_INT);
            $stmt->bindParam(':empl_inss', $empl_inss);
            $stmt->bindParam(':empl_nombre', $empl_nombre);
            $stmt->bindParam(':empl_cedula', $empl_cedula);
            $stmt->bindParam(':empl_telefono', $empl_telefono);
            $stmt->bindParam(':empl_estado_civil', $empl_estado_civil);
            $stmt->bindParam(':empl_direccion', $empl_direccion);
            $stmt->bindParam(':empl_fecha_nacimiento', $empl_fecha_nacimiento);
            $stmt->bindParam(':empl_genero', $empl_genero);
            $stmt->bindParam(':empl_estado', $empl_estado);
            $stmt->bindParam(':empl_usuario_id', $empl_usuario_id);



            $stmt->execute();
            // $sql = $conexionBD->prepare("UPDATE tbl_empleado SET empl_inss=?, empl_nombre=?, empl_cedula=?,empl_telefono=?,empl_estado_civil=?, empl_direccion=? ,empl_fecha_nacimiento=?, empl_genero=?,empl_usuario_id=? empl_estado=? WHERE empl_codigo=?");
            // $sql->execute(array($empl_codigo,$empl_inss, $empl_nombre, $empl_cedula, $empl_telefono, $empl_estado_civil, $empl_direccion, $empl_fecha_nacimiento, $empl_genero, $empl_usuario_id, $empl_estado));
        } catch (PDOException $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}

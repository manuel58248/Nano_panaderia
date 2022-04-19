<?php
include_once("./conexion.php");

class Usuario
{
    public $usr_codigo;
    public $usr_nombre;
    public $usr_email;
    public $usr_clave;
    public $usr_estado;
    public $rol = null;

    public function __construct($usr_codigo, $usr_email, $usr_nombre, $usr_clave, $usr_estado, $rol = null)
    {
        $this->usr_codigo = $usr_codigo;
        $this->usr_email = $usr_email;
        $this->usr_nombre = $usr_nombre;
        $this->usr_clave = $usr_clave;
        $this->usr_estado = $usr_estado;
        $this->rol = $rol;
    }

    public static function inicio()
    {

        $listaUsuario = [];
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->query("SELECT * FROM cat_usuario");

        foreach ($sql->fetchAll() as $usuario) {
            $listaUsuario[] = new Usuario($usuario['usr_codigo'], $usuario['usr_email'], $usuario['usr_nombre'], $usuario['usr_clave'], $usuario['usr_estado']);
        }

        return $listaUsuario;
    }


    public static function crear($usr_email, $usr_nombre, $usr_clave)
    {
        try {
            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->prepare("INSERT INTO cat_usuario(usr_email, usr_nombre, usr_clave, usr_estado) VALUES (?,?,?,?)");
            $sql->execute(array($usr_email, $usr_nombre, $usr_clave, '1'));
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public static function borrar($usr_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cat_usuario WHERE usr_codigo=? ");
        $sql->execute(array($usr_codigo));
    }

    public static function buscar($usr_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cat_usuario WHERE usr_codigo=?");
        $sql->execute(array($usr_codigo));
        $usuario = $sql->fetch();
        return new Usuario($usuario['usr_codigo'], $usuario['usr_email'], $usuario['usr_nombre'], $usuario['usr_clave'], $usuario['usr_estado']);
    }


    public static function Obtener_rol($usr_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT cat_usuario.*, cat_rol.* FROM cat_usuario INNER JOIN tbl_usuario_rol ON tbl_usuario_rol.ur_usuario_id = cat_usuario.usr_codigo INNER JOIN cat_rol ON cat_rol.rol_codigo = tbl_usuario_rol.ur_rol_id where usr_codigo=?");
        $sql->execute(array($usr_codigo));
        $usuario = $sql->fetch();
        return new Usuario($usuario['usr_codigo'], $usuario['usr_email'], $usuario['usr_nombre'], $usuario['usr_clave'], $usuario['usr_estado'], $usuario['rol_value']);
    }

    public static function login($usr_nombre, $usr_clave)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cat_usuario WHERE usr_nombre=? AND usr_clave=? AND usr_estado='1'");
        $sql->execute(array($usr_nombre, $usr_clave));

        $usuario = $sql->fetch();
        return new Usuario($usuario['usr_codigo'], $usuario['usr_email'], $usuario['usr_nombre'], $usuario['usr_clave'], $usuario['usr_estado']);
    }

    public static function editar($usr_codigo, $usr_email, $usr_nombre, $usr_clave, $usr_estado)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("UPDATE cat_usuario SET usr_email=?, usr_nombre=? ,usr_clave=?,usr_estado=? WHERE usr_codigo=? ");
        $sql->execute(array($usr_email, $usr_nombre, $usr_clave, $usr_estado, $usr_codigo));
    }
}
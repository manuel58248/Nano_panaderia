<?php 
include_once("./conexion.php");

class UsuarioRol {
    public $ur_codigo;
    public $ur_usuario;
    public $ur_rol;

    public function __construct($ur_codigo, $ur_usuario, $ur_rol) {
        $this->ur_codigo = $ur_codigo;
        $this->ur_usuario = $ur_usuario;
        $this->ur_rol = $ur_rol;    
    }

    public static function crear($ur_usuario, $ur_rol)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("INSERT INTO tbl_usuario_rol(ur_usuario, ur_rol) VALUES (?, ?)");
        $sql->execute(array($ur_usuario, $ur_rol));
    }

    public static function listaPorUsuario($ur_usuario) {
        try {
            $listaUsuarioRol = [];

            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM tbl_usuario_rol");

            foreach ($sql->fetchAll() as $UsuarioRol) {

                $listaUsuarioRol[] = new UsuarioRol($UsuarioRol['ur_codigo'], $UsuarioRol['ur_usuario'], $UsuarioRol['ur_rol']);
            }

            return $listaUsuarioRol;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }
}
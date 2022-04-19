<?php
include_once("./modelos/usuario-rol.php");

class Seguridad {
    private static $instance = null;
    private $roles;

    private function __construct()
    {
        session_start();
        $session = $_SESSION['session'];

        if($session != null) {
            $this->roles = UsuarioRol::listaPorUsuario($session);
        }
    }

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new Seguridad();
        }

        return self::$instance;
    }

    private function redireccionar() {
        header("Location:./?controlador=errores&accion=permiso");
    }

    private function buscarRoles($listaRoles) {
        foreach($listaRoles as $rol) {
            foreach($this->roles as $usuarioRol) {
                if ($usuarioRol->rol_nombre === $rol) {
                    return true;
                }
            }
        }

        return false;
    }

    public function verificarRoles($listaRoles) {

        $tieneRol = $this->buscarRoles($listaRoles);
        if(!$tieneRol) {
            $this->redireccionar();
        }
    }

}
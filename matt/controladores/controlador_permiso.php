<?php
include_once("./modelos/permiso.php");
include_once("conexion.php");

class ControladorPermiso
{
    public function inicio()
    {
        $listaPermisos = Permiso::inicio();
        include_once("./vistas/paginas/permiso/inicio.php");
    }

    public function crear() {

        if($_POST) {
            $perm_nombre = $_POST['permiso_nombre'];
            Permiso::crear($perm_nombre);
            header("location:./?controlador=permiso&accion=inicio");

        }
        include_once("./vistas/paginas/permiso/crear.php");
    }
}

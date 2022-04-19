<?php
include_once("./modelos/rol.php");
include_once("conexion.php");

class ControladorRol
{
    public function inicio()
    {
        $listaRoles = Rol::inicio();
        include_once("./vistas/paginas/rol/inicio.php");
    }

    public function crear()
    {

        if ($_POST) {
            $rol_nombre = $_POST['rol_nombre'];
            $rol_nombre = json_encode($rol_nombre);
            Rol::crear($rol_nombre);
            header("location:./?controlador=rol&accion=incio");
        }
        include_once("./vistas/paginas/rol/crear.php");
    }
}

<?php
include_once("./modelos/cliente.php");
include_once("./modelos/usuario.php");
include_once("conexion.php");



class ControladorCliente
{
    public function inicio()
    {
        $listaCliente = cliente::inicio();
        include_once("./vistas/paginas/cliente/inicio.php");
    }


    public function crear()
    {
        $usuarios = Usuario::inicio();
        if ($_POST) {
            try {
                print_r($_POST);

                $clt_cedula_ruc = $_POST['clt_cedula_ruc'];
                $clt_usuario_id = $_POST['clt_usuario_id'];
                $clt_nombre = $_POST['clt_nombre'];
                $clt_telefono = $_POST['clt_telefono'];
                $clt_direccion = $_POST['clt_direccion'];
                $clt_fecha_nacimiento = $_POST['clt_fecha_nacimiento'];
                $clt_genero = $_POST['clt_genero'];

                cliente::crear(
                    $clt_cedula_ruc,
                    $clt_usuario_id,
                    $clt_nombre,
                    $clt_telefono,
                    $clt_direccion,
                    $clt_fecha_nacimiento,
                    $clt_genero
                );
                header("Location:./?controlador=cliente&accion=inicio");
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }

        include_once("./vistas/paginas/cliente/crear.php");
    }

    public function editar()
    {
        try {
            if ($_POST) {
                $clt_codigo = $_POST['clt_codigo'];
                $clt_cedula_ruc = $_POST['clt_cedula_ruc'];
                $clt_usuario_id = $_POST['clt_usuario_id'];
                $clt_nombre = $_POST['clt_nombre'];
                $clt_telefono = $_POST['clt_telefono'];
                $clt_direccion = $_POST['clt_direccion'];
                $clt_fecha_nacimiento = $_POST['clt_fecha_nacimiento'];
                $clt_genero = $_POST['clt_genero'];


                Cliente::editar($clt_codigo, $clt_cedula_ruc, $clt_usuario_id, $clt_nombre, $clt_telefono, $clt_direccion, $clt_fecha_nacimiento, $clt_genero);

                header("location:./?controlador=empleado&accion=inicio");
            }
            $clt_codigo = $_GET['clt_codigo'];

            $cliente = (Cliente::buscar($clt_codigo));
            include_once("vistas/paginas/empleados/editar.php");
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}

<?php
include_once("./modelos/pago.php");
include_once("conexion.php");



class ControladorPago
{

    public function inicio()
    {
        $listaPago = Pago::inicio();
        include_once("./vistas/paginas/pago/inicio.php");
    }


    public function crear()
    {
        if ($_POST) {


            $mp_nombre = $_POST['mp_nombre'];


            Pago::crear($mp_nombre);

            header("location:./?controlador=area&accion=inicio");
        }
        include_once("./vistas/paginas/pago/crear.php");
    }




    public function editar()

    {
        try {

            if ($_POST) {
                // $mp_codigo = $_POST['mp_codigo'];
                $mp_nombre = $_POST['mp_nombre'];
                $mp_estado = $_POST['mp_estado'];
                print_r($_POST);
                Pago::editar($mp_nombre, $mp_estado);

                header("location:./?controlador=pago&accion=inicio");
            }
            $mp_codigo = $_GET['mp_codigo'];

            $pago = (Pago::buscar($mp_codigo));
            include_once("vistas/paginas/pago/editar.php");
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    public function borrar()
    {
        print_r($_POST);

        $mp_codigo = $_GET['mp_codigo'];

        Pago::borrar($mp_codigo);


        header("Location:/?controlador=pago=inicio");
    }
}

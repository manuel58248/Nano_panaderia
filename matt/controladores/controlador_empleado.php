<?php
include_once("./modelos/empleado.php");
include_once("./modelos/usuario.php");

class ControladorEmpleado
 
{

    public function inicio()
    
    {
        
       
        $listaEmpleados = Empleado::inicio();
        print_r($listaEmpleados);
        include_once("./vistas/paginas/empleados/inicio.php");
    }

    public function crear()
    {
        
        $usuarios = Usuario::inicio();
        try {
            
            if ($_POST) {

                
                $empl_inss = $_POST['empl_inss'];
                $empl_nombre = $_POST['empl_nombre'];
                $empl_cedula = $_POST['empl_cedula'];
                $empl_telefono = $_POST['empl_telefono'];
                $empl_direccion = $_POST['empl_direccion'];
                $empl_estado_civil = $_POST['empl_estado_civil'];
                $empl_fecha_nacimiento = $_POST['empl_fecha_nacimiento'];
                $empl_genero = $_POST['empl_genero'];
                $empl_usuario_id = $_POST['empl_usuario_id'];

                Empleado::crear(
                    $empl_inss,
                    $empl_nombre,
                    $empl_cedula,
                    $empl_telefono,
                    $empl_estado_civil,
                    $empl_direccion,
                    $empl_fecha_nacimiento,
                    $empl_genero,
                    $empl_usuario_id
                );
                header("Location:./?controlador=empleado&accion=inicio");
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

        include_once("./vistas/paginas/empleados/crear.php");
    }

    public function editar()
    {
        try {
            print_r($_POST);
             $usuarios = Usuario::inicio();
            if ($_POST) {
                $empl_codigo=$_POST['empl_codigo'];
                $empl_inss = $_POST['empl_inss'];
                $empl_nombre = $_POST['empl_nombre'];
                $empl_cedula = $_POST['empl_cedula'];
                $empl_telefono = $_POST['empl_telefono'];
                $empl_direccion = $_POST['empl_direccion'];
                $empl_estado_civil = $_POST['empl_estado_civil'];
                $empl_fecha_nacimiento = $_POST['empl_fecha_nacimiento'];
                $empl_genero = $_POST['empl_genero'];
                $empl_estado = $_POST['empl_estado'];
                $empl_usuario_id = $_POST['empl_usuario_id'];

                Empleado::editar( $empl_codigo,$empl_inss, $empl_nombre, $empl_cedula, $empl_telefono, $empl_direccion, $empl_estado_civil, $empl_fecha_nacimiento, $empl_genero, $empl_estado, $empl_usuario_id);

                // header("location:./?controlador=empleado&accion=inicio");
            }
            $empl_codigo = $_GET['empl_codigo'];

            $empleado = (Empleado::buscar($empl_codigo));
            include_once("vistas/paginas/empleados/editar.php");
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }



    public function borrar()
    {
        print_r($_POST);

        $empl_codigo = $_GET['empl_codigo'];

        Empleado::borrar($empl_codigo);

        header("location:./?controlador=empleado&accion=inicio");
    }
}

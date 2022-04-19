<?php
include_once("./modelos/area.php");
include_once("conexion.php");



class ControladorArea
{

  public function inicio()
  {
    $listaArea = Area::inicio();
    include_once("./vistas/paginas/area/inicio.php");
  }


  public function crear()
  {
    if ($_POST) {

      // print_r($_POST);

      // $area_codigo=$_POST['area_codigo'];
      $area_nombre = $_POST['area_nombre'];
      $area_descripcion = $_POST['area_descripcion'];

      Area::crear($area_nombre, $area_descripcion);

      header("location:./?controlador=area&accion=inicio");
    }
    include_once("./vistas/paginas/area/crear.php");
  }




  public function editar()

  {
    try {

      if ($_POST) {
        $area_codigo = $_POST['area_codigo'];
        $area_nombre = $_POST['area_nombre'];
        $area_descripcion = $_POST['area_descripcion'];

        print_r($_POST);
        Area::editar($area_codigo, $area_nombre, $area_descripcion);

        header("location:./?controlador=area&accion=inicio");
      }
      $area_codigo = $_GET['area_codigo'];

      $Area = (Area::buscar($area_codigo));
      include_once("vistas/paginas/area/editar.php");
    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }
  public function borrar()
  {
    print_r($_POST);

    $area_codigo = $_GET['area_codigo'];

    Area::borrar($area_codigo);


    header("Location:/?controlador=area=inicio");
  }
}

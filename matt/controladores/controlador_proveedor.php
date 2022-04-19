<?php
include_once("./modelos/proveedor.php");
include_once("conexion.php");



class ControladorProveedor
{

  public function inicio()
  {
    $listaProveedor = Proveedor::inicio();
    include_once("./vistas/paginas/proveedor/inicio.php");
  }


  public function crear()
  {
    if ($_POST) {

      print_r($_POST);
      $proveed_nombre = $_POST['proveed_nombre'];
      $proveed_telefono = $_POST['proveed_telefono'];
      $proveed_correo = $_POST['proveed_correo'];
      $proveed_estado = $_POST['proveed_estado'];

      Proveedor::crear($proveed_nombre, $proveed_telefono, $proveed_correo, $proveed_estado);

      header("location:./?controlador=proveedor&accion=inicio");
    }

    include_once("./vistas/paginas/proveedor/crear.php");
  }
  public function editar()

  {



    if ($_POST) {
      $proveed_codigo = $_POST['proveed_codigo'];
      $proveed_nombre = $_POST['proveed_nombre'];
      $proveed_telefono = $_POST['proveed_telefono'];
      $proveed_correo = $_POST['proveed_correo'];
      $proveed_estado = $_POST['proveed_estado'];
      print_r($_POST);
      Proveedor::editar($proveed_codigo, $proveed_nombre, $proveed_telefono, $proveed_correo, $proveed_estado);

      // header("location:./?controlador=proveedor&accion=inicio");
    }
    $proveed_codigo = $_GET['proveed_codigo'];

    $proveedor = (Proveedor::buscar($proveed_codigo));
    include_once("vistas/paginas/proveedor/editar.php");
  }
  public function borrar()
  {
    print_r($_POST);

    $proveed_codigo = $_GET['proveed_codigo'];

    proveedor::borrar($proveed_codigo);


    header("Location:/?controlador=proveedor=inicio");
  }
}

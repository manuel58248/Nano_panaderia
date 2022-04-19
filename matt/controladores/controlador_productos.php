<?php
include_once("./modelos/productos.php");
include_once("conexion.php");



class ControladorProductos
{

  public function inicio()
  {
    $listaProductos = Producto::inicio();
    include_once("./vistas/paginas/productos/inicio.php");
  }


  public function crear()
  {
    if ($_POST) {

      print_r($_POST);

      $producto_nombre = $_POST['producto_nombre'];
      $producto_marca = $_POST['producto_marca'];
      $producto_clasificacion = $_POST['producto_clasificacion'];
      $producto_unidad_medida = $_POST['producto_unidad_medida'];
      $producto_stock = $_POST['producto_stock'];
      $producto_fecha_ingresado = $_POST['producto_fecha_ingresado'];
      $producto_fecha_vencida = $_POST['producto_fecha_vencida'];
      $producto_precio = $_POST['producto_precio'];
      // $producto_estado = $_POST['producto_estado'];


      Producto::crear(
        $producto_nombre,
        $producto_marca,
        $producto_clasificacion,
        $producto_unidad_medida,
        $producto_stock,
        $producto_fecha_ingresado,
        $producto_fecha_vencida,
        $producto_precio

        // $producto_estado
      );

      // header("location:../?controlador=productos&accion=inicio");
    }

    include_once("./vistas/paginas/productos/crear.php");
  }
  public function editar()

  {

    if ($_POST) {
      $producto_codigo = $_POST['producto_codigo'];
      $producto_nombre = $_POST['producto_nombre'];
      $producto_marca = $_POST['producto_marca'];
      $producto_clasificacion = $_POST['producto_clasificacion'];
      $producto_unidad_medida = $_POST['producto_unidad_medida'];
      $producto_stock = $_POST['producto_stock'];
      $producto_fecha_ingresado = $_POST['producto_fecha_ingresado'];
      $producto_fecha_vencida = $_POST['producto_fecha_vencida'];
      $producto_precio = $_POST['producto_precio'];
      $producto_estado = $_POST['producto_estado'];

      print_r($_POST);
      Producto::editar($producto_codigo, $producto_nombre, $producto_marca, $producto_clasificacion, $producto_unidad_medida, $producto_stock, $producto_fecha_ingresado, $producto_fecha_vencida, $producto_precio, $producto_estado);

      header("location:../?controlador=proveedor&accion=inicio");
    }
    $producto_codigo = $_GET['producto_codigo'];

    $Producto = (Producto::buscar($producto_codigo));
    include_once("vistas/paginas/productos/editar.php");
  }
  public function borrar()
  {
    print_r($_POST);

    $producto_codigo = $_GET['producto_codigo'];

    Producto::borrar($producto_codigo);


    // header("Location:/?controlador=producto=inicio");
  }
}

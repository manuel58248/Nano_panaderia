<?php
include_once("./conexion.php");

class Producto
{
    public $producto_codigo;
    public $producto_nombre;
    public $producto_marca;
    public $producto_clasificacion;
    public $producto_unidad_medida;
    public $producto_stock;
    public $producto_precio;
    public $producto_fecha_ingresado;
    public $producto_fecha_vencida;
    public $producto_estado;


    public function __construct($producto_codigo, $producto_nombre, $producto_marca, $producto_clasificacion, $producto_unidad_medida, $producto_stock, $producto_precio, $producto_fecha_ingresado, $producto_fecha_vencida, $producto_estado)
    {
        $this->producto_codigo = $producto_codigo;
        $this->producto_nombre = $producto_nombre;
        $this->producto_marca = $producto_marca;
        $this->producto_clasificacion = $producto_clasificacion;
        $this->producto_unidad_medida = $producto_unidad_medida;
        $this->producto_stock = $producto_stock;
        $this->producto_precio = $producto_precio;
        $this->producto_fecha_ingresado = $producto_fecha_ingresado;
        $this->producto_fecha_vencida = $producto_fecha_vencida;
        $this->producto_estado = $producto_estado;
    }

    public static function inicio()
    {
        try {
            $listaProductos = [];
            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->query("SELECT * FROM cat_producto");

            foreach ($sql->fetchAll() as $Producto) {

                $listaProductos[] = new Producto($Producto['producto_codigo'], $Producto['producto_nombre'], $Producto['producto_marca'], $Producto['producto_clasificacion'], $Producto['producto_unidad_medida'], $Producto['producto_stock'], $Producto['producto_precio'], $Producto['producto_fecha_ingresado'], $Producto['producto_fecha_vencida'], $Producto['producto_estado']);
            }

            return $listaProductos;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return [];
        }
    }


    public static function crear($producto_nombre, $producto_marca, $producto_clasificacion, $producto_unidad_medida, $producto_stock, $producto_fecha_ingresado, $producto_fecha_vencida, $producto_precio)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("INSERT INTO cat_producto(producto_nombre,producto_marca,producto_clasificacion,producto_unidad_medida,producto_stock ,producto_precio,producto_fecha_ingresado,producto_fecha_vencida, producto_estado ) VALUES (?,?,?,?,?,?,?,?,?)");

        $sql->execute(array($producto_nombre, $producto_marca, $producto_clasificacion, $producto_unidad_medida, $producto_stock, $producto_fecha_ingresado, $producto_fecha_vencida, $producto_precio, 'activo'));
    }
    public static function borrar($producto_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cat_producto WHERE producto_codigo=? ");
        $sql->execute(array($producto_codigo));
    }

    public static function buscar($producto_codigo)
    {
        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cat_producto WHERE producto_codigo=?");
        $sql->execute(array($producto_codigo));
        $Producto = $sql->fetch();
        return new Producto($Producto['producto_codigo'], $Producto['producto_nombre'], $Producto['producto_marca'], $Producto['producto_clasificacion'], $Producto['producto_unidad_medida'], $Producto['producto_stock'], $Producto['producto_precio'], $Producto['$producto_fecha_ingresado'], $Producto['$producto_fecha_vencida'], $Producto['producto_estado']);
    }


    public static function editar($producto_codigo, $producto_nombre, $producto_marca, $producto_clasificacion, $producto_unidad_medida, $producto_stock, $producto_fecha_ingresado, $producto_fecha_vencida, $producto_precio, $producto_estado)
    {

        $conexionBD = BaseDeDatos::obtenerInstancia();
        $sql = $conexionBD->prepare("UPDATE cat_producto SET producto_nombre=?, producto_marca=?, producto_clasificacion=?,producto_unidad_medida=?, producto_stock,producto_precio=? , producto_fecha_ingresado=?, producto_fecha_vencida=? WHERE producto_codigo=? ");
        $sql->execute(array($producto_codigo, $producto_nombre, $producto_marca, $producto_clasificacion, $producto_unidad_medida, $producto_stock, $producto_fecha_ingresado, $producto_fecha_vencida, $producto_precio));
    }
}

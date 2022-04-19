<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$opc = (isset($_POST['opc'])) ? $_POST['opc'] : '';

switch ($opc) {
    case 1: //Buscamos los productos

        $productoId = (isset($_POST['productoId'])) ? $_POST['productoId'] : '';

        $consulta = "SELECT * FROM cat_producto WHERE producto_codigo = '$productoId'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

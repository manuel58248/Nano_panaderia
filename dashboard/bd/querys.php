<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$opc = (isset($_POST['opc'])) ? $_POST['opc'] : '';

switch ($opc) {
    case 1: //Insertar Proveedor

        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';

        $consulta = "INSERT INTO cat_proveedor(proveed_nombre, proveed_telefono, proveed_correo, proveed_estado) VALUES('$nombre', '$telefono', '$correo', 1)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;


    case 2: // Creamos un Usuario
        $name = (isset($_POST['name'])) ? $_POST['name'] : '';
        $password = (isset($_POST['password'])) ? $_POST['password'] : '';
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';

        $passwordAsh = password_hash($password, PASSWORD_DEFAULT);

        $consulta = "INSERT INTO cat_usuario(usr_email, usr_nombre, usr_clave, usr_estado) VALUES('$correo', '$name', '$passwordAsh', 1)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3:
        $area_nombre = (isset($_POST['area_nombre'])) ? $_POST['area_nombre'] : '';
        $area_descripcion = (isset($_POST['area_descripcion'])) ? $_POST['area_descripcion'] : '';

        $consulta = "INSERT INTO cat_area(area_nombre,area_descripcion) VALUES('$area_nombre', '$area_descripcion')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 4:
        $persona_fecha_nacimiento = (isset($_POST['persona_fecha_nacimiento'])) ? $_POST['persona_fecha_nacimiento'] : '';
        $persona_nombre = (isset($_POST['persona_nombre'])) ? $_POST['persona_nombre'] : '';
        $persona_genero = (isset($_POST['persona_genero'])) ? $_POST['persona_genero'] : '';
        $persona_movil = (isset($_POST['persona_movil'])) ? $_POST['persona_movil'] : '';
        $persona_convencional = (isset($_POST['persona_convencional'])) ? $_POST['persona_convencional'] : '';
        $persona_direccion = (isset($_POST['persona_direccion'])) ? $_POST['persona_direccion'] : '';


        $consulta = "INSERT INTO cat_persona(persona_fecha_nacimiento,persona_nombre,persona_genero,persona_movil,persona_convencional,persona_direccion) VALUES('$persona_fecha_nacimiento', '$persona_nombre' ,'$persona_genero','$persona_movil','$persona_convencional','$persona_direccion')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 5:
        $formula_nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
        $formula_descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';

        $consulta = "INSERT INTO cat_formula(formula_nombre,formula_descripcion) VALUES('$formula_nombre', '$formula_descripcion')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 6:
        $produccion_nombre = (isset($_POST['produccion_nombre'])) ? $_POST['produccion_nombre'] : '';
        $produccion_fecha_inicio = (isset($_POST['produccion_fecha_inicio'])) ? $_POST['produccion_fecha_inicio'] : '';

        $consulta = "INSERT INTO cat_produccion(produccion_nombre,produccion_fecha_inicio) VALUES('$produccion_nombre', '$produccion_fecha_inicio')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 7:
        $producto_codigo_unico = (isset($_POST['producto_codigo_unico'])) ? $_POST['producto_codigo_unico'] : '';
        $producto_nombre = (isset($_POST['producto_nombre'])) ? $_POST['producto_nombre'] : '';
        $producto_precio_compra = (isset($_POST['producto_precio_compra'])) ? $_POST['producto_precio_compra'] : '';
        $producto_um_id = (isset($_POST['producto_um_id'])) ? $_POST['producto_um_id'] : '';
        $producto_presentacion_id = (isset($_POST['producto_presentacion_id'])) ? $_POST['producto_presentacion_id'] : '';
        $producto_comentario = (isset($_POST['producto_comentario'])) ? $_POST['producto_comentario'] : '';
        $producto_vencimiento = (isset($_POST['producto_vencimiento'])) ? $_POST['producto_vencimiento'] : '';
        $producto_stock = (isset($_POST['producto_stock'])) ? $_POST['producto_stock'] : '';
        $producto_estado = (isset($_POST['producto_estado'])) ? $_POST['producto_estado'] : '';

        $consulta = "INSERT INTO cat_producto(producto_codigo_unico,producto_nombre,producto_precio_compra,producto_um_id,
        producto_presentacion_id,producto_comentario,producto_vencimiento,producto_stock,producto_estado) VALUES('$producto_codigo_unico', '$producto_nombre','$producto_precio_compra',
        '$producto_um_id','$producto_presentacion_id','$producto_comentario','$producto_vencimiento','$producto_stock' ,1)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 8:

        $consulta = "SELECT MAX(formula_codigo) AS ultimoIdFormula FROM cat_formula";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $dt_formula_codigo = $data[0]["ultimoIdFormula"];

        $dt_formula_producto_id = (isset($_POST['productoId'])) ? $_POST['productoId'] : '';
        $dt_formula_cantidad = (isset($_POST['productoCantidades'])) ? $_POST['productoCantidades'] : '';

        $consulta = "INSERT INTO tbl_detalle_formula(dt_formula_formula_id,dt_formula_producto_id,dt_formula_cantidad) VALUES('$dt_formula_codigo', '$dt_formula_producto_id', '$dt_formula_cantidad')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        // cliente
    case 9:
        $clt_cedula_ruc = (isset($_POST['clt_cedula_ruc'])) ? $_POST['clt_cedula_ruc'] : '';
        $clt_usuario_id = (isset($_POST['clt_usuario_id'])) ? $_POST['clt_usuario_id'] : '';
        $clt_persona_id = (isset($_POST['clt_persona_id'])) ? $_POST['clt_persona_id'] : '';


        $consulta = "INSERT INTO tbl_cliente(clt_cedula_ruc,clt_usuario_id,clt_persona_id) VALUES('$clt_cedula_ruc', '$clt_usuario_id','$clt_persona_id')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);


        break;

    case 10:
        $venta_metodo_pago_id = (isset($_POST['venta_metodo_pago_id'])) ? $_POST['venta_metodo_pago_id'] : '';
        $venta_num_factura = (isset($_POST['venta_num_factura'])) ? $_POST['venta_num_factura'] : '';
        $venta_descripcion = (isset($_POST['venta_descripcion'])) ? $_POST['venta_descripcion'] : '';
        $venta_descuento = (isset($_POST['venta_descuento'])) ? $_POST['venta_descuento'] : '';
        $venta_impuesto = (isset($_POST['venta_impuesto'])) ? $_POST['venta_impuesto'] : '';
        $venta_subtotal = (isset($_POST['venta_subtotal'])) ? $_POST['venta_subtotal'] : '';
        $venta_total = (isset($_POST['venta_total'])) ? $_POST['venta_total'] : '';
        $venta_fecha_registro = (isset($_POST['venta_fecha_registro'])) ? $_POST['venta_fecha_registro'] : '';

        $consulta = "INSERT INTO cat_venta(venta_metodo_pago_id,venta_num_factura,venta_descripcion,venta_descuento,venta_impuesto,venta_subtotal,venta_total,venta_fecha_registro) VALUES('$venta_metodo_pago_id', '$venta_num_factura','$venta_descripcion','$venta_descuento',
        '$venta_impuesto','$venta_subtotal','$venta_total','$venta_fecha_registro',)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;


    case 11:

        $consulta = "SELECT MAX(produccion_codigo) AS ultimoIdFormula FROM cat_produccion";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $dt_formula_codigo = $data[0]["ultimoIdFormula"];

        $dt_produccion_produccion_id  = (isset($_POST['dt_produccion_produccion_id '])) ? $_POST['dt_produccion_produccion_id '] : '';
        $dt_produccion_codigo_unico = (isset($_POST['dt_produccion_codigo_unico'])) ? $_POST['dt_produccion_codigo_unico'] : '';
        $dt_produccion_comentario = (isset($_POST['dt_produccion_comentario'])) ? $_POST['dt_produccion_comentario'] : '';
        $dt_produccion_vecimiento = (isset($_POST['dt_produccion_vecimiento'])) ? $_POST['dt_produccion_vecimiento'] : '';
        $dt_produccion_formula_id  = (isset($_POST['dt_produccion_formula_id '])) ? $_POST['dt_produccion_formula_id '] : '';
        $dt_produccion_cantidad = (isset($_POST['dt_produccion_cantidad'])) ? $_POST['dt_produccion_cantidad'] : '';
        $dt_produccion_hora_estimada = (isset($_POST['dt_produccion_hora_estimada'])) ? $_POST['dt_produccion_hora_estimada'] : '';
        $consulta = "INSERT INTO tbl_detalle_produccion(dt_produccion_produccion_id,dt_produccion_codigo_unico,dt_produccion_comentario,dt_produccion_vecimiento,dt_produccion_formula_id,dt_produccion_cantidad,dt_produccion_hora_estimada) VALUES('$dt_produccion_produccion_id ', '$dt_produccion_codigo_unico ', '$dt_produccion_comentario ', '$dt_produccion_vecimiento ', '$dt_produccion_formula_id ', '$dt_produccion_cantidad', '$dt_produccion_hora_estimada')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        break;

    case 12:
        $compra_proveedor_id  = (isset($_POST['compra_proveedor_id '])) ? $_POST['compra_proveedor_id '] : '';
        $compra_usr_id  = (isset($_POST['compra_usr_id '])) ? $_POST['compra_usr_id '] : '';
        $compra_num_factura   = (isset($_POST['compra_num_factura  '])) ? $_POST['compra_num_factura  '] : '';
        $compra_descripcion  = (isset($_POST['compra_descripcion '])) ? $_POST['compra_descripcion '] : '';
        $compra_subtotal  = (isset($_POST['compra_subtotal '])) ? $_POST['compra_subtotal '] : '';
        $compra_descuento  = (isset($_POST['compra_descuento '])) ? $_POST['compra_descuento '] : '';
        $compra_total  = (isset($_POST['compra_total '])) ? $_POST['compra_total '] : '';
        $compra_mp_id   = (isset($_POST['compra_mp_id  '])) ? $_POST['compra_mp_id  '] : '';
        $compra_fecha_registro  = (isset($_POST['compra_fecha_registro '])) ? $_POST['compra_fecha_registro '] : '';
        $compra_fecha_entrega   = (isset($_POST['compra_fecha_entrega  '])) ? $_POST['compra_fecha_entrega  '] : '';

        $consulta = "INSERT INTO cat_compra(compra_proveedor_id,compra_usr_id,compra_num_factura,compra_descripcion,compra_subtotal,compra_descuento,compra_total,compra_mp_id,compra_fecha_registro,compra_fecha_entrega) VALUES('$compra_proveedor_id', '$compra_usr_id','$compra_num_factura',
        '$compra_descripcion','$compra_subtotal','$compra_descuento','$compra_total','$compra_mp_id','$compra_fecha_registro','$compra_fecha_entrega')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

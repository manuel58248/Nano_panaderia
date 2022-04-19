-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2021 a las 07:36:53
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_area`
--

CREATE TABLE `cat_area` (
  `area_codigo` int(11) NOT NULL,
  `area_nombre` varchar(70) NOT NULL,
  `area_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_cargo`
--

CREATE TABLE `cat_cargo` (
  `cargo_codigo` int(11) NOT NULL,
  `cargo_area_id` int(11) NOT NULL,
  `cargo_nombre` varchar(80) NOT NULL,
  `cargo_descripcion` varchar(100) DEFAULT NULL,
  `cargo_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_categoria`
--

CREATE TABLE `cat_categoria` (
  `categoria_codigo` int(11) NOT NULL,
  `categoria_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_compra`
--

CREATE TABLE `cat_compra` (
  `compra_codigo` int(11) NOT NULL,
  `compra_proveedor_id` int(11) NOT NULL,
  `compra_usr_id` int(11) NOT NULL,
  `compra_num_factura` varchar(100) NOT NULL,
  `compra_descripcion` varchar(100) DEFAULT NULL,
  `compra_subtotal` double NOT NULL,
  `compra_descuento` double NOT NULL,
  `compra_total` double NOT NULL,
  `compra_mp_id` int(11) NOT NULL,
  `compra_fecha_registro` date NOT NULL,
  `compra_fecha_entrega` datetime NOT NULL,
  `compra_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_conexion`
--

CREATE TABLE `cat_conexion` (
  `conexion_codigo` int(11) NOT NULL,
  `conexion` varchar(15) NOT NULL,
  `sesion_estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_formula`
--

CREATE TABLE `cat_formula` (
  `formula_codigo` int(11) NOT NULL,
  `formula_nombre` varchar(50) NOT NULL,
  `formula_descripcion` varchar(100) DEFAULT NULL,
  `formula_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_metodo_pago`
--

CREATE TABLE `cat_metodo_pago` (
  `mp_codigo` int(11) NOT NULL,
  `mp_nombre` varchar(15) NOT NULL,
  `mp_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_pedido`
--

CREATE TABLE `cat_pedido` (
  `pedido_codigo` int(11) NOT NULL,
  `pedido_cliente_id` int(11) NOT NULL,
  `pedido_metodo_pago_id` int(11) NOT NULL,
  `pedido_descripcion` varchar(100) DEFAULT NULL,
  `pedido_descuento` double NOT NULL,
  `pedido_impuesto` double NOT NULL,
  `pedido_subtotal` double NOT NULL,
  `pedido_total` double NOT NULL,
  `pedido_fecha_registro` date NOT NULL,
  `pedido_fecha_entrega` datetime NOT NULL,
  `pedido_estado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_perfil`
--

CREATE TABLE `cat_perfil` (
  `perfil_codigo` int(11) NOT NULL,
  `perfil_nombre` varchar(40) NOT NULL,
  `perfil_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_permiso`
--

CREATE TABLE `cat_permiso` (
  `perm_codigo` int(11) NOT NULL,
  `perm_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_persona`
--

CREATE TABLE `cat_persona` (
  `persona_codigo` int(11) NOT NULL,
  `persona_fecha_nacimiento` date DEFAULT NULL,
  `persona_nombre` varchar(100) NOT NULL,
  `persona_genero` int(1) DEFAULT NULL,
  `persona_movil` int(9) DEFAULT NULL,
  `persona_convencional` int(9) DEFAULT NULL,
  `persona_direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_precio`
--

CREATE TABLE `cat_precio` (
  `precio_codigo` int(11) NOT NULL,
  `precio_cantidad` double NOT NULL,
  `precio_tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_produccion`
--

CREATE TABLE `cat_produccion` (
  `produccion_codigo` int(11) NOT NULL,
  `produccion_descripcion` varchar(30) DEFAULT NULL,
  `produccion_fecha_inicio` datetime NOT NULL,
  `produccion_estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_producto`
--

CREATE TABLE `cat_producto` (
  `producto_codigo` int(11) NOT NULL,
  `producto_nombre` varchar(50) NOT NULL,
  `producto_clasificacion` varchar(20) NOT NULL,
  `producto_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_proveedor`
--

CREATE TABLE `cat_proveedor` (
  `proveed_codigo` int(11) NOT NULL,
  `proveed_nombre` varchar(100) NOT NULL,
  `proveed_telefono` int(9) DEFAULT NULL,
  `proveed_correo` varchar(70) DEFAULT NULL,
  `proveed_estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_proveedor`
--

INSERT INTO `cat_proveedor` (`proveed_codigo`, `proveed_nombre`, `proveed_telefono`, `proveed_correo`, `proveed_estado`) VALUES
(3, 'Victor Lopez', 88888888, 'prueba@gmail.com', 1),
(5, 'prueba Proveedor', 77777777, 'prueba2@gmail.com', 1),
(6, 'Matt', 44444444, 'matt@matt.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_rol`
--

CREATE TABLE `cat_rol` (
  `rol_codigo` int(11) NOT NULL,
  `rol_nombre` varchar(30) NOT NULL,
  `rol_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_rol`
--

INSERT INTO `cat_rol` (`rol_codigo`, `rol_nombre`, `rol_estado`) VALUES
(1, '\"Ventas\"', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_sesion`
--

CREATE TABLE `cat_sesion` (
  `sesion_codigo` int(11) NOT NULL,
  `sesion_usuario` varchar(50) NOT NULL,
  `sesion_fecha_inicio` datetime NOT NULL,
  `sesion_fecha_finalizada` datetime DEFAULT NULL,
  `sesion_estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_unidad_medida`
--

CREATE TABLE `cat_unidad_medida` (
  `um_codigo` int(11) NOT NULL,
  `um_nombre` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_usuario`
--

CREATE TABLE `cat_usuario` (
  `usr_codigo` int(11) NOT NULL,
  `usr_email` varchar(70) NOT NULL,
  `usr_nombre` varchar(20) NOT NULL,
  `usr_clave` varchar(20) NOT NULL,
  `usr_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_usuario`
--

INSERT INTO `cat_usuario` (`usr_codigo`, `usr_email`, `usr_nombre`, `usr_clave`, `usr_estado`) VALUES
(1, 'prueba@prueba.com', 'prueba', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_vencimiento`
--

CREATE TABLE `cat_vencimiento` (
  `vencimiento_codigo` int(11) NOT NULL,
  `vencimiento_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_venta`
--

CREATE TABLE `cat_venta` (
  `venta_codigo` int(11) NOT NULL,
  `venta_cliente_id` int(11) NOT NULL,
  `venta_metodo_pago_id` int(11) NOT NULL,
  `venta_num_factura` varchar(100) NOT NULL,
  `venta_descripcion` varchar(100) DEFAULT NULL,
  `venta_descuento` double NOT NULL,
  `venta_impuesto` double NOT NULL,
  `venta_subtotal` double NOT NULL,
  `venta_total` double NOT NULL,
  `venta_fecha_registro` date NOT NULL,
  `venta_estado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `clt_codigo` int(11) NOT NULL,
  `clt_cedula_ruc` varchar(16) DEFAULT NULL,
  `clt_usuario_id` int(11) DEFAULT NULL,
  `clt_persona_id` int(11) DEFAULT NULL,
  `clt_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_control_sesion`
--

CREATE TABLE `tbl_control_sesion` (
  `cs_codigo` int(11) NOT NULL,
  `cs_sesion_id` int(11) NOT NULL,
  `cs_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_compra`
--

CREATE TABLE `tbl_detalle_compra` (
  `dt_compra_codigo` int(11) NOT NULL,
  `dt_compra_compra_id` int(11) NOT NULL,
  `dt_compra_producto_id` int(11) NOT NULL,
  `dt_compra_precio_id` int(11) NOT NULL,
  `dt_compra_cantidad` double NOT NULL,
  `dt_compra_monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_formula`
--

CREATE TABLE `tbl_detalle_formula` (
  `dt_formula_codigo` int(11) NOT NULL,
  `dt_formula_formula_id` int(11) NOT NULL,
  `dt_formula_producto_id` int(11) NOT NULL,
  `dt_formula_cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_pedido`
--

CREATE TABLE `tbl_detalle_pedido` (
  `dt_pedido_codigo` int(11) NOT NULL,
  `dt_pedido_pedido_id` int(11) NOT NULL,
  `dt_pedido_producto_id` int(11) NOT NULL,
  `dt_pedido_cantidad` double NOT NULL,
  `dt_pedido_precio_id` int(11) NOT NULL,
  `dt_pedido_monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_produccion`
--

CREATE TABLE `tbl_detalle_produccion` (
  `dt_produccion_codigo` int(11) NOT NULL,
  `dt_produccion_produccion_id` int(11) NOT NULL,
  `dt_produccion_producto_id` int(11) NOT NULL,
  `dt_produccion_formula_id` int(11) NOT NULL,
  `dt_produccion_descripcion` varchar(50) DEFAULT NULL,
  `dt_produccion_cantidad` int(11) NOT NULL,
  `dt_produccion_hora_estimada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_producto`
--

CREATE TABLE `tbl_detalle_producto` (
  `dt_producto_codigo` int(11) NOT NULL,
  `dt_producto_producto_id` int(11) NOT NULL,
  `dt_producto_um_id` int(11) NOT NULL,
  `dt_producto_cantidad` double NOT NULL,
  `dt_producto_vencimiento_id` int(11) NOT NULL,
  `dt_producto_fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_venta`
--

CREATE TABLE `tbl_detalle_venta` (
  `dt_venta_codigo` int(11) NOT NULL,
  `dt_venta_venta_id` int(11) NOT NULL,
  `dt_venta_producto_id` int(11) NOT NULL,
  `dt_venta_cantidad` double NOT NULL,
  `dt_venta_precio_id` int(11) NOT NULL,
  `dt_venta_monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `empl_codigo` int(11) NOT NULL,
  `empl_inss` varchar(12) NOT NULL,
  `empl_cedula` varchar(16) NOT NULL,
  `empl_persona_id` int(11) NOT NULL,
  `empl_usr_id` int(11) NOT NULL,
  `empl_estado_civil` int(1) NOT NULL,
  `empl_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial_cargo`
--

CREATE TABLE `tbl_historial_cargo` (
  `histc_codigo` int(11) NOT NULL,
  `histc_empleado_id` int(11) NOT NULL,
  `histc_cargo_id` int(11) NOT NULL,
  `histc_fecha_inicio` datetime NOT NULL,
  `histc_fecha_finalizo` datetime DEFAULT NULL,
  `histc_motivo_movimiento` varchar(100) DEFAULT NULL,
  `histc_autorizado_por` varchar(50) DEFAULT NULL,
  `histc_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_inventario`
--

CREATE TABLE `tbl_inventario` (
  `inventario_codigo` int(11) NOT NULL,
  `inventario_producto_id` int(11) NOT NULL,
  `inventario_proveedor_id` int(11) NOT NULL,
  `inventario_existencias` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfil_permiso`
--

CREATE TABLE `tbl_perfil_permiso` (
  `rp_codigo` int(11) NOT NULL,
  `rp_perfil_id` int(11) NOT NULL,
  `rp_permiso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto_categoria`
--

CREATE TABLE `tbl_producto_categoria` (
  `pc_codigo` int(11) NOT NULL,
  `pc_producto_id` int(11) NOT NULL,
  `pc_categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol_perfil`
--

CREATE TABLE `tbl_rol_perfil` (
  `rp_codigo` int(11) NOT NULL,
  `rp_rol_id` int(11) NOT NULL,
  `rp_perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario_conexion`
--

CREATE TABLE `tbl_usuario_conexion` (
  `uc_codigo` int(11) NOT NULL,
  `uc_usuario` int(11) NOT NULL,
  `uc_conexion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario_rol`
--

CREATE TABLE `tbl_usuario_rol` (
  `ur_codigo` int(11) NOT NULL,
  `ur_rol_id` int(11) NOT NULL,
  `ur_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_area`
--
ALTER TABLE `cat_area`
  ADD PRIMARY KEY (`area_codigo`),
  ADD UNIQUE KEY `area_nombre` (`area_nombre`);

--
-- Indices de la tabla `cat_cargo`
--
ALTER TABLE `cat_cargo`
  ADD PRIMARY KEY (`cargo_codigo`),
  ADD UNIQUE KEY `cargo_area_id` (`cargo_area_id`),
  ADD UNIQUE KEY `cargo_nombre` (`cargo_nombre`);

--
-- Indices de la tabla `cat_categoria`
--
ALTER TABLE `cat_categoria`
  ADD PRIMARY KEY (`categoria_codigo`),
  ADD UNIQUE KEY `categoria_nombre` (`categoria_nombre`);

--
-- Indices de la tabla `cat_compra`
--
ALTER TABLE `cat_compra`
  ADD PRIMARY KEY (`compra_codigo`),
  ADD UNIQUE KEY `compra_proveedor_id` (`compra_proveedor_id`),
  ADD UNIQUE KEY `compra_usr_id` (`compra_usr_id`),
  ADD UNIQUE KEY `compra_num_factura` (`compra_num_factura`),
  ADD UNIQUE KEY `compra_mp_id` (`compra_mp_id`);

--
-- Indices de la tabla `cat_conexion`
--
ALTER TABLE `cat_conexion`
  ADD PRIMARY KEY (`conexion_codigo`);

--
-- Indices de la tabla `cat_formula`
--
ALTER TABLE `cat_formula`
  ADD PRIMARY KEY (`formula_codigo`),
  ADD UNIQUE KEY `formula_nombre` (`formula_nombre`);

--
-- Indices de la tabla `cat_metodo_pago`
--
ALTER TABLE `cat_metodo_pago`
  ADD PRIMARY KEY (`mp_codigo`),
  ADD UNIQUE KEY `mp_nombre` (`mp_nombre`);

--
-- Indices de la tabla `cat_pedido`
--
ALTER TABLE `cat_pedido`
  ADD PRIMARY KEY (`pedido_codigo`),
  ADD UNIQUE KEY `pedido_usuario_id` (`pedido_cliente_id`),
  ADD UNIQUE KEY `pedido_metodo_pago_id` (`pedido_metodo_pago_id`);

--
-- Indices de la tabla `cat_perfil`
--
ALTER TABLE `cat_perfil`
  ADD PRIMARY KEY (`perfil_codigo`),
  ADD UNIQUE KEY `perfil_nombre` (`perfil_nombre`);

--
-- Indices de la tabla `cat_permiso`
--
ALTER TABLE `cat_permiso`
  ADD PRIMARY KEY (`perm_codigo`),
  ADD UNIQUE KEY `perm_nombre` (`perm_nombre`);

--
-- Indices de la tabla `cat_persona`
--
ALTER TABLE `cat_persona`
  ADD PRIMARY KEY (`persona_codigo`);

--
-- Indices de la tabla `cat_precio`
--
ALTER TABLE `cat_precio`
  ADD PRIMARY KEY (`precio_codigo`);

--
-- Indices de la tabla `cat_produccion`
--
ALTER TABLE `cat_produccion`
  ADD PRIMARY KEY (`produccion_codigo`);

--
-- Indices de la tabla `cat_producto`
--
ALTER TABLE `cat_producto`
  ADD PRIMARY KEY (`producto_codigo`),
  ADD UNIQUE KEY `producto_nombre` (`producto_nombre`);

--
-- Indices de la tabla `cat_proveedor`
--
ALTER TABLE `cat_proveedor`
  ADD PRIMARY KEY (`proveed_codigo`),
  ADD UNIQUE KEY `proveed_nombre` (`proveed_nombre`),
  ADD UNIQUE KEY `proveed_telefono` (`proveed_telefono`),
  ADD UNIQUE KEY `proveed_correo` (`proveed_correo`);

--
-- Indices de la tabla `cat_rol`
--
ALTER TABLE `cat_rol`
  ADD PRIMARY KEY (`rol_codigo`),
  ADD UNIQUE KEY `perm_nombre` (`rol_nombre`);

--
-- Indices de la tabla `cat_sesion`
--
ALTER TABLE `cat_sesion`
  ADD PRIMARY KEY (`sesion_codigo`);

--
-- Indices de la tabla `cat_unidad_medida`
--
ALTER TABLE `cat_unidad_medida`
  ADD PRIMARY KEY (`um_codigo`),
  ADD UNIQUE KEY `um_nombre` (`um_nombre`);

--
-- Indices de la tabla `cat_usuario`
--
ALTER TABLE `cat_usuario`
  ADD PRIMARY KEY (`usr_codigo`),
  ADD UNIQUE KEY `usr_email` (`usr_email`),
  ADD UNIQUE KEY `usr_nombre` (`usr_nombre`);

--
-- Indices de la tabla `cat_vencimiento`
--
ALTER TABLE `cat_vencimiento`
  ADD PRIMARY KEY (`vencimiento_codigo`);

--
-- Indices de la tabla `cat_venta`
--
ALTER TABLE `cat_venta`
  ADD PRIMARY KEY (`venta_codigo`),
  ADD UNIQUE KEY `venta_cliente_id` (`venta_cliente_id`),
  ADD UNIQUE KEY `venta_metodo_pago_id` (`venta_metodo_pago_id`),
  ADD UNIQUE KEY `venta_num_factura` (`venta_num_factura`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`clt_codigo`),
  ADD UNIQUE KEY `clt_usuario_id` (`clt_usuario_id`),
  ADD UNIQUE KEY `tbl_cliente_clt_cedula_ruc_uindex` (`clt_cedula_ruc`),
  ADD KEY `fk_cliente__persona` (`clt_persona_id`);

--
-- Indices de la tabla `tbl_control_sesion`
--
ALTER TABLE `tbl_control_sesion`
  ADD PRIMARY KEY (`cs_codigo`),
  ADD UNIQUE KEY `cs_sesion_id` (`cs_sesion_id`),
  ADD UNIQUE KEY `cs_usuario_id` (`cs_usuario_id`);

--
-- Indices de la tabla `tbl_detalle_compra`
--
ALTER TABLE `tbl_detalle_compra`
  ADD PRIMARY KEY (`dt_compra_codigo`),
  ADD UNIQUE KEY `dt_compra_compra` (`dt_compra_compra_id`),
  ADD UNIQUE KEY `dt_compra_producto_id` (`dt_compra_producto_id`),
  ADD KEY `fk_detalle_compra__precio` (`dt_compra_precio_id`);

--
-- Indices de la tabla `tbl_detalle_formula`
--
ALTER TABLE `tbl_detalle_formula`
  ADD PRIMARY KEY (`dt_formula_codigo`),
  ADD UNIQUE KEY `dt_formula_formula_id` (`dt_formula_formula_id`),
  ADD UNIQUE KEY `dt_formula_producto_id` (`dt_formula_producto_id`);

--
-- Indices de la tabla `tbl_detalle_pedido`
--
ALTER TABLE `tbl_detalle_pedido`
  ADD PRIMARY KEY (`dt_pedido_codigo`),
  ADD UNIQUE KEY `dt_pedido_pedido_id` (`dt_pedido_pedido_id`),
  ADD UNIQUE KEY `dt_pedido_producto_id` (`dt_pedido_producto_id`),
  ADD KEY `fk_detalle_pedido__precio` (`dt_pedido_precio_id`);

--
-- Indices de la tabla `tbl_detalle_produccion`
--
ALTER TABLE `tbl_detalle_produccion`
  ADD PRIMARY KEY (`dt_produccion_codigo`),
  ADD UNIQUE KEY `dt_produccion_produccion_id` (`dt_produccion_produccion_id`),
  ADD UNIQUE KEY `dt_produccion_producto_id` (`dt_produccion_producto_id`),
  ADD UNIQUE KEY `dt_produccion_formula_id` (`dt_produccion_formula_id`);

--
-- Indices de la tabla `tbl_detalle_producto`
--
ALTER TABLE `tbl_detalle_producto`
  ADD PRIMARY KEY (`dt_producto_codigo`),
  ADD UNIQUE KEY `dt_producto_unidad_medida_id` (`dt_producto_um_id`),
  ADD UNIQUE KEY `dt_producto_vencimiento_id` (`dt_producto_vencimiento_id`),
  ADD KEY `fk_detalle_producto__producto` (`dt_producto_producto_id`);

--
-- Indices de la tabla `tbl_detalle_venta`
--
ALTER TABLE `tbl_detalle_venta`
  ADD PRIMARY KEY (`dt_venta_codigo`),
  ADD UNIQUE KEY `dt_venta_venta_id` (`dt_venta_venta_id`),
  ADD UNIQUE KEY `dt_venta_producto_id` (`dt_venta_producto_id`),
  ADD KEY `fk_detalle_venta__precio` (`dt_venta_precio_id`);

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`empl_codigo`),
  ADD UNIQUE KEY `empl_usuario_id` (`empl_usr_id`),
  ADD UNIQUE KEY `empl_cedula` (`empl_cedula`),
  ADD UNIQUE KEY `empl_inss` (`empl_inss`),
  ADD KEY `fk_empleado__persona` (`empl_persona_id`);

--
-- Indices de la tabla `tbl_historial_cargo`
--
ALTER TABLE `tbl_historial_cargo`
  ADD PRIMARY KEY (`histc_codigo`),
  ADD UNIQUE KEY `histc_empleado_id` (`histc_empleado_id`),
  ADD UNIQUE KEY `histc_cargo_id` (`histc_cargo_id`);

--
-- Indices de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  ADD PRIMARY KEY (`inventario_codigo`),
  ADD UNIQUE KEY `inventario_producto_id` (`inventario_producto_id`),
  ADD UNIQUE KEY `inventario_proveedor_id` (`inventario_proveedor_id`);

--
-- Indices de la tabla `tbl_perfil_permiso`
--
ALTER TABLE `tbl_perfil_permiso`
  ADD PRIMARY KEY (`rp_codigo`),
  ADD KEY `fk_perfil_permiso__permiso` (`rp_permiso_id`),
  ADD KEY `fk_perfil_permiso__perfil` (`rp_perfil_id`);

--
-- Indices de la tabla `tbl_producto_categoria`
--
ALTER TABLE `tbl_producto_categoria`
  ADD PRIMARY KEY (`pc_codigo`),
  ADD UNIQUE KEY `pc_producto_id` (`pc_producto_id`),
  ADD UNIQUE KEY `pc_categoria_id` (`pc_categoria_id`);

--
-- Indices de la tabla `tbl_rol_perfil`
--
ALTER TABLE `tbl_rol_perfil`
  ADD PRIMARY KEY (`rp_codigo`),
  ADD KEY `fk_rol_perfil__perfil` (`rp_perfil_id`),
  ADD KEY `fk_rol_perfil__rol` (`rp_rol_id`);

--
-- Indices de la tabla `tbl_usuario_conexion`
--
ALTER TABLE `tbl_usuario_conexion`
  ADD PRIMARY KEY (`uc_codigo`),
  ADD KEY `fk_usuario_conexion__conexion` (`uc_conexion`),
  ADD KEY `fk_usuario_conexion__usuario` (`uc_usuario`);

--
-- Indices de la tabla `tbl_usuario_rol`
--
ALTER TABLE `tbl_usuario_rol`
  ADD PRIMARY KEY (`ur_codigo`),
  ADD KEY `fk_usuario_rol__usuario` (`ur_usuario_id`),
  ADD KEY `fk_usuario_rol__rol` (`ur_rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_area`
--
ALTER TABLE `cat_area`
  MODIFY `area_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_cargo`
--
ALTER TABLE `cat_cargo`
  MODIFY `cargo_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_categoria`
--
ALTER TABLE `cat_categoria`
  MODIFY `categoria_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_compra`
--
ALTER TABLE `cat_compra`
  MODIFY `compra_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_conexion`
--
ALTER TABLE `cat_conexion`
  MODIFY `conexion_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_formula`
--
ALTER TABLE `cat_formula`
  MODIFY `formula_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_metodo_pago`
--
ALTER TABLE `cat_metodo_pago`
  MODIFY `mp_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_pedido`
--
ALTER TABLE `cat_pedido`
  MODIFY `pedido_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_perfil`
--
ALTER TABLE `cat_perfil`
  MODIFY `perfil_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_permiso`
--
ALTER TABLE `cat_permiso`
  MODIFY `perm_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_persona`
--
ALTER TABLE `cat_persona`
  MODIFY `persona_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_precio`
--
ALTER TABLE `cat_precio`
  MODIFY `precio_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_produccion`
--
ALTER TABLE `cat_produccion`
  MODIFY `produccion_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_producto`
--
ALTER TABLE `cat_producto`
  MODIFY `producto_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_proveedor`
--
ALTER TABLE `cat_proveedor`
  MODIFY `proveed_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cat_rol`
--
ALTER TABLE `cat_rol`
  MODIFY `rol_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cat_sesion`
--
ALTER TABLE `cat_sesion`
  MODIFY `sesion_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_unidad_medida`
--
ALTER TABLE `cat_unidad_medida`
  MODIFY `um_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_usuario`
--
ALTER TABLE `cat_usuario`
  MODIFY `usr_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cat_vencimiento`
--
ALTER TABLE `cat_vencimiento`
  MODIFY `vencimiento_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_venta`
--
ALTER TABLE `cat_venta`
  MODIFY `venta_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `clt_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_control_sesion`
--
ALTER TABLE `tbl_control_sesion`
  MODIFY `cs_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_compra`
--
ALTER TABLE `tbl_detalle_compra`
  MODIFY `dt_compra_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_formula`
--
ALTER TABLE `tbl_detalle_formula`
  MODIFY `dt_formula_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_pedido`
--
ALTER TABLE `tbl_detalle_pedido`
  MODIFY `dt_pedido_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_produccion`
--
ALTER TABLE `tbl_detalle_produccion`
  MODIFY `dt_produccion_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_producto`
--
ALTER TABLE `tbl_detalle_producto`
  MODIFY `dt_producto_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_venta`
--
ALTER TABLE `tbl_detalle_venta`
  MODIFY `dt_venta_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  MODIFY `empl_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_historial_cargo`
--
ALTER TABLE `tbl_historial_cargo`
  MODIFY `histc_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  MODIFY `inventario_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_perfil_permiso`
--
ALTER TABLE `tbl_perfil_permiso`
  MODIFY `rp_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_producto_categoria`
--
ALTER TABLE `tbl_producto_categoria`
  MODIFY `pc_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_rol_perfil`
--
ALTER TABLE `tbl_rol_perfil`
  MODIFY `rp_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario_conexion`
--
ALTER TABLE `tbl_usuario_conexion`
  MODIFY `uc_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario_rol`
--
ALTER TABLE `tbl_usuario_rol`
  MODIFY `ur_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_cargo`
--
ALTER TABLE `cat_cargo`
  ADD CONSTRAINT `fk_cargo__area` FOREIGN KEY (`cargo_area_id`) REFERENCES `cat_area` (`area_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cat_compra`
--
ALTER TABLE `cat_compra`
  ADD CONSTRAINT `fk_compra__proveedor` FOREIGN KEY (`compra_proveedor_id`) REFERENCES `cat_proveedor` (`proveed_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compra__usuario` FOREIGN KEY (`compra_usr_id`) REFERENCES `cat_usuario` (`usr_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prueba1__metodo_pago` FOREIGN KEY (`compra_mp_id`) REFERENCES `cat_metodo_pago` (`mp_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cat_pedido`
--
ALTER TABLE `cat_pedido`
  ADD CONSTRAINT `fk_pedido__metodo_pago` FOREIGN KEY (`pedido_metodo_pago_id`) REFERENCES `cat_metodo_pago` (`mp_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedido__usuario` FOREIGN KEY (`pedido_cliente_id`) REFERENCES `tbl_cliente` (`clt_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cat_venta`
--
ALTER TABLE `cat_venta`
  ADD CONSTRAINT `fk_venta__metodo_pago` FOREIGN KEY (`venta_metodo_pago_id`) REFERENCES `cat_metodo_pago` (`mp_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_venta__usuario` FOREIGN KEY (`venta_cliente_id`) REFERENCES `tbl_cliente` (`clt_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD CONSTRAINT `fk_cliente__persona` FOREIGN KEY (`clt_persona_id`) REFERENCES `cat_persona` (`persona_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cliente__usuario` FOREIGN KEY (`clt_usuario_id`) REFERENCES `cat_usuario` (`usr_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_control_sesion`
--
ALTER TABLE `tbl_control_sesion`
  ADD CONSTRAINT `fk_control_sesion__sesion` FOREIGN KEY (`cs_sesion_id`) REFERENCES `cat_sesion` (`sesion_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_control_sesion__usuario` FOREIGN KEY (`cs_usuario_id`) REFERENCES `cat_usuario` (`usr_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_detalle_compra`
--
ALTER TABLE `tbl_detalle_compra`
  ADD CONSTRAINT `fk_compra__compra` FOREIGN KEY (`dt_compra_compra_id`) REFERENCES `cat_compra` (`compra_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compra__producto` FOREIGN KEY (`dt_compra_producto_id`) REFERENCES `cat_producto` (`producto_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_compra__precio` FOREIGN KEY (`dt_compra_precio_id`) REFERENCES `cat_precio` (`precio_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_detalle_formula`
--
ALTER TABLE `tbl_detalle_formula`
  ADD CONSTRAINT `fk_detalle_formula__formula` FOREIGN KEY (`dt_formula_formula_id`) REFERENCES `cat_formula` (`formula_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_formula__producto` FOREIGN KEY (`dt_formula_producto_id`) REFERENCES `cat_producto` (`producto_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_detalle_pedido`
--
ALTER TABLE `tbl_detalle_pedido`
  ADD CONSTRAINT `fk_detalle_pedido__pedido` FOREIGN KEY (`dt_pedido_pedido_id`) REFERENCES `cat_pedido` (`pedido_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_pedido__precio` FOREIGN KEY (`dt_pedido_precio_id`) REFERENCES `cat_precio` (`precio_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_pedido__producto` FOREIGN KEY (`dt_pedido_producto_id`) REFERENCES `cat_producto` (`producto_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_detalle_produccion`
--
ALTER TABLE `tbl_detalle_produccion`
  ADD CONSTRAINT `fk_detalle_produccion` FOREIGN KEY (`dt_produccion_formula_id`) REFERENCES `cat_formula` (`formula_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_produccion__produccion` FOREIGN KEY (`dt_produccion_produccion_id`) REFERENCES `cat_produccion` (`produccion_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_produccion__producto` FOREIGN KEY (`dt_produccion_producto_id`) REFERENCES `cat_producto` (`producto_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_detalle_producto`
--
ALTER TABLE `tbl_detalle_producto`
  ADD CONSTRAINT `fk_detalle_producto__producto` FOREIGN KEY (`dt_producto_producto_id`) REFERENCES `cat_producto` (`producto_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_producto__unidad_medida` FOREIGN KEY (`dt_producto_um_id`) REFERENCES `cat_unidad_medida` (`um_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_producto__vencimiento` FOREIGN KEY (`dt_producto_vencimiento_id`) REFERENCES `cat_vencimiento` (`vencimiento_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_detalle_venta`
--
ALTER TABLE `tbl_detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta__precio` FOREIGN KEY (`dt_venta_precio_id`) REFERENCES `cat_precio` (`precio_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_venta__producto` FOREIGN KEY (`dt_venta_producto_id`) REFERENCES `cat_producto` (`producto_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_venta__venta` FOREIGN KEY (`dt_venta_venta_id`) REFERENCES `cat_venta` (`venta_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD CONSTRAINT `fk_empleado__persona` FOREIGN KEY (`empl_persona_id`) REFERENCES `cat_persona` (`persona_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_empleado__usuario` FOREIGN KEY (`empl_usr_id`) REFERENCES `cat_usuario` (`usr_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_historial_cargo`
--
ALTER TABLE `tbl_historial_cargo`
  ADD CONSTRAINT `fk_historial_cargo__cargo` FOREIGN KEY (`histc_cargo_id`) REFERENCES `cat_cargo` (`cargo_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_historial_cargo__empleado` FOREIGN KEY (`histc_empleado_id`) REFERENCES `tbl_empleado` (`empl_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  ADD CONSTRAINT `fk_inventario__producto` FOREIGN KEY (`inventario_producto_id`) REFERENCES `cat_producto` (`producto_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventario__proveedor` FOREIGN KEY (`inventario_proveedor_id`) REFERENCES `cat_proveedor` (`proveed_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_perfil_permiso`
--
ALTER TABLE `tbl_perfil_permiso`
  ADD CONSTRAINT `fk_perfil_permiso__perfil` FOREIGN KEY (`rp_perfil_id`) REFERENCES `cat_perfil` (`perfil_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perfil_permiso__permiso` FOREIGN KEY (`rp_permiso_id`) REFERENCES `cat_permiso` (`perm_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_producto_categoria`
--
ALTER TABLE `tbl_producto_categoria`
  ADD CONSTRAINT `fk_producto_categoria__categoria` FOREIGN KEY (`pc_categoria_id`) REFERENCES `cat_categoria` (`categoria_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_categoria__producto` FOREIGN KEY (`pc_producto_id`) REFERENCES `cat_producto` (`producto_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_rol_perfil`
--
ALTER TABLE `tbl_rol_perfil`
  ADD CONSTRAINT `fk_rol_perfil__perfil` FOREIGN KEY (`rp_perfil_id`) REFERENCES `cat_perfil` (`perfil_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rol_perfil__rol` FOREIGN KEY (`rp_rol_id`) REFERENCES `cat_rol` (`rol_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuario_conexion`
--
ALTER TABLE `tbl_usuario_conexion`
  ADD CONSTRAINT `fk_usuario_conexion__conexion` FOREIGN KEY (`uc_conexion`) REFERENCES `cat_conexion` (`conexion_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_conexion__usuario` FOREIGN KEY (`uc_usuario`) REFERENCES `cat_usuario` (`usr_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuario_rol`
--
ALTER TABLE `tbl_usuario_rol`
  ADD CONSTRAINT `fk_usuario_rol__rol` FOREIGN KEY (`ur_rol_id`) REFERENCES `cat_rol` (`rol_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_rol__usuario` FOREIGN KEY (`ur_usuario_id`) REFERENCES `cat_usuario` (`usr_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

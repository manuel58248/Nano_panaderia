<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    session_start();
    if ($_SESSION["s_usuario"] === null) {
        header("Location: http://localhost/PanaderiaNano/index.php");
    }

    require '../../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Consulta anidada para mostrar los roles del usuario
    $usuario = $_SESSION["s_usuario"];
    $consulta = "SELECT * FROM `roles` WHERE usr_nombre = '$usuario'";

    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <title>Panadería Nano</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="http://localhost/PanaderiaNano/dashboard/css/global.css">
    <link rel="stylesheet" href="http://localhost/PanaderiaNano/dashboard/css/all.css">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <div class="container-fluid main">
            <div class="row">
                <div class="col col-3 bg-light">
                    <div class="flex-shrink-0 bg-light">
                        <a href="/" class="d-flex align-items-center py-3 mb-3 link-dark text-decoration-none border-bottom">
                            <span class="fs-5 fw-semibold">Panadería Nano</span>
                        </a>
                        <ul class="list-unstyled ps-0">

                            <?php
                            foreach ($data as $dat) {
                                if (strcmp($dat["perfil_nombre"], "Inventario") == false) { ?>
                                    <li class="mb-1">

                                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#inventario-collapse" aria-expanded="false">
                                            <i class="fas fa-box-open"></i>
                                            Inventario
                                        </button>
                                        <div class="collapse" id="inventario-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/producto/inicio.php"); ?>" class="link-dark rounded text-decoration-none"> Producto</a></li>

                                            </ul>
                                        </div>
                                    </li>
                            <?php }
                            } ?>


                            <?php
                            foreach ($data as $dat) {
                                if (strcmp($dat["perfil_nombre"], "Compra") == false) { ?>
                                    <li class="mb-1">
                                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#compra-collapse" aria-expanded="false">
                                            <i class="fas fa-shopping-bag"></i>
                                            Compra
                                        </button>
                                        <div class="collapse" id="compra-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/proveedor/insertarProveedor.php"); ?>" class="link-dark rounded text-decoration-none">Proveedor</a></li>
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/compra/inicio.php"); ?>" class="link-dark rounded text-decoration-none">Compra</a></li>
                                            </ul>
                                        </div>
                                    </li>

                            <?php }
                            } ?>
                            <!-- Vamos a quitarla -->
                            <?php
                            foreach ($data as $dat) {
                                if (strcmp($dat["perfil_nombre"], "Ventas") == false) { ?>
                                    <li class="mb-1">
                                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#venta-collapse" aria-expanded="false">
                                            <i class="fa-light fa-pallet-box"></i>
                                            <i class="fas fa-shopping-cart"></i>
                                            Venta
                                        </button>
                                        <div class="collapse" id="venta-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/venta/inicio.php"); ?>" class="link-dark rounded text-decoration-none">Venta</a></li>
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/pedido/inicio.php"); ?>" class="link-dark rounded text-decoration-none">Pedido</a></li>
                                            </ul>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                            <!--  -->
                            <?php
                            foreach ($data as $dat) {
                                if (strcmp($dat["perfil_nombre"], "Produccion") == false) { ?>
                                    <li class="mb-1">
                                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#produccion-collapse" aria-expanded="false">
                                            <i class="fas fa-industry"></i>
                                            Producción
                                        </button>
                                        <div class="collapse" id="produccion-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/formula/inicio.php"); ?>" class="link-dark rounded text-decoration-none">Fórmula</a></li>
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/produccion/inicio.php"); ?>" class="link-dark rounded text-decoration-none">Producción</a></li>
                                            </ul>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                            <?php
                            foreach ($data as $dat) {
                                if (strcmp($dat["perfil_nombre"], "Reporte") == false) { ?>
                                    <li class="mb-1">
                                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#reportes-collapse" aria-expanded="false">
                                            <i class="fas fa-chart-bar"></i>
                                            Reportes
                                        </button>
                                        <div class="collapse" id="reportes-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li class="ms-2"><a href="" class="link-dark rounded text-decoration-none">Compras</a></li>
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/venta/reporte.php"); ?>" class="link-dark rounded text-decoration-none">Ventas</a></li>
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/factura/reporte.php"); ?>" class="link-dark rounded text-decoration-none">Factura</a></li>

                                                <li class="ms-2"><a href="#" class="link-dark rounded text-decoration-none">Producción</a></li>
                                                <li class="ms-2"><a href="<?php print_r($_SESSION["URL"] . "/reporte/reporte.php"); ?>" class="link-dark rounded text-decoration-none">Formula</a></li>
                                                <li class="ms-2"><a href="#" class="link-dark rounded text-decoration-none">Inventario</a></li>
                                            </ul>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                            <?php
                            foreach ($data as $dat) {
                                if (strcmp($dat["perfil_nombre"], "Administracion") == false) { ?>
                                    <li class="mb-1">
                                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#administracion-collapse" aria-expanded="false">
                                            <i class="fas fa-toolbox"></i>
                                            Administración
                                        </button>
                                        <div class="collapse" id="administracion-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li class="mb-1">
                                                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#seguridad-collapse" aria-expanded="false">
                                                        <i class="fas fa-shield-alt"></i>
                                                        Seguridad
                                                    </button>
                                                    <div class="collapse" id="seguridad-collapse">
                                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                            <li class="ms-4"><a href="?controlador=rol&amp;accion=inicio" class="link-dark rounded text-decoration-none">Roles</a>
                                                            </li>
                                                            <li class="ms-4"><a href="#" class="link-dark rounded text-decoration-none">Conexión</a>
                                                            </li>
                                                            <li class="ms-4"><a href="#" class="link-dark rounded text-decoration-none">Sesión</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="mb-2">
                                                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#Persona-collapse" aria-expanded="false">
                                                        <i class="fas fa-user"></i>
                                                        Persona
                                                    </button>
                                                    <div class="collapse" id="Persona-collapse">
                                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                            <li class="ms-4"><a href="<?php print_r($_SESSION["URL"] . "/usuario/inicio.php"); ?>" class="link-dark rounded text-decoration-none">Usuarios</a>
                                                            </li>
                                                            <li class="ms-4"><a href="<?php print_r($_SESSION["URL"] . "/empleado/inicio.php"); ?>" class=" link-dark rounded text-decoration-none">Empleado</a>
                                                            </li>
                                                            <li class="ms-4"><a href="<?php print_r($_SESSION["URL"] . "/persona/inicio.php"); ?>" class="link-dark rounded text-decoration-none">Persona</a>
                                                            </li>
                                                            <li class="ms-4"><a href="<?php print_r($_SESSION["URL"] . "/cliente/inicio.php"); ?>" class="link-dark rounded text-decoration-none">cliente</a>
                                                            </li>
                                                            <li class="ms-4"><a href="<?php print_r($_SESSION["URL"] . "/area/inicio.php"); ?>" class="link-dark rounded text-decoration-none">Area</a></li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#mantenimiento-collapse" aria-expanded="false">
                                                    <i class="fas fa-tools"></i>
                                                    Mantenimiento
                                                </button>
                                                <div class="collapse" id="mantenimiento-collapse">
                                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                        <li class="ms-4"><a href="/?controlador=empleado&amp;accion=inicio" class="link-dark rounded text-decoration-none">Empleado</a></li>
                                                    </ul>
                                                </div>

                                                <li class="ms-2"><a href="#" class="link-dark rounded text-decoration-none">Configuración</a></li>
                                            </ul>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                            <li class="border-top my-3"></li>
                            <li class="mb-1">
                                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                                    <i class="fas fa-user-circle"></i>
                                    Account
                                </button>
                                <div class="collapse" id="account-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="#" class="link-dark rounded">New...</a></li>
                                        <li><a href="#" class="link-dark rounded">Profile</a></li>
                                        <li><a href="#" class="link-dark rounded">Settings</a></li>
                                        <li><a href="<?php print_r($_SESSION["LOGOUT"]); ?>" class="link-dark rounded">Sign out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col col-9 py-5">
                    <div class="container">
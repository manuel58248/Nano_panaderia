<?php

include_once("./modelos/usuario.php");

?>

<!doctype html>
<html lang="en">

<head>
  <title>Panadería Nano</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./vistas/css/global.css">
  <link rel="stylesheet" href="./vistas/css/all.css">
</head>

<body>
  <div class="container-fluid main">
    <div class="row">
      <div class="col col-3 bg-light">
        <div class="flex-shrink-0 bg-light">
          <a href="/" class="d-flex align-items-center py-3 mb-3 link-dark text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">Panadería Nano</span>
          </a>
          <ul class="list-unstyled ps-0">
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#inventario-collapse" aria-expanded="false">
                <i class="fas fa-dolly-flatbed"></i>
                Inventario
              </button>
              <div class="collapse" id="inventario-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li class="ms-2"><a href="?controlador=productos&accion=inicio" class="link-dark rounded text-decoration-none"> Producto</a></li>

                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#compra-collapse" aria-expanded="false">
                <i class="fas fa-shopping-bag"></i>
                Compra
              </button>
              <div class="collapse" id="compra-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li class="ms-2"><a href="?controlador=proveedor&accion=inicio" class="link-dark rounded text-decoration-none">Proveedor</a></li>
                  <li class="ms-2"><a href="?controlador=compra&accion=inicio" class="link-dark rounded text-decoration-none">Compra</a></li>
                </ul>
              </div>
            </li>
            <!-- Vamos a quitarla -->
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#venta-collapse" aria-expanded="false">
                <i class="fas fa-dollar-sign"></i>
                Venta
              </button>
              <div class="collapse" id="venta-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <?php if (false) { ?>
                    <li class="ms-2"><a href="?controlador=cliente&accion=inicio" class="link-dark rounded text-decoration-none">Cliente</a></li>
                  <?php } ?>
                  <li class="ms-2"><a href="?controlador=compra&accion=inicio" class="link-dark rounded text-decoration-none">Venta</a></li>
                </ul>
              </div>
            </li>
            <!--  -->
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#produccion-collapse" aria-expanded="false">
                <i class="fas fa-industry"></i>
                Producción
              </button>
              <div class="collapse" id="produccion-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li class="ms-2"><a href="?controlador=formula&accion=inicio" class="link-dark rounded text-decoration-none">Fórmula</a></li>
                  <li class="ms-2"><a href="?controlador=produccion&accion=inicio" class="link-dark rounded text-decoration-none">Producción</a></li>
                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#reportes-collapse" aria-expanded="false">
                <i class="fas fa-chart-bar"></i>
                Reportes
              </button>
              <div class="collapse" id="reportes-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li class="ms-2"><a href="" class="link-dark rounded text-decoration-none">Compras</a></li>
                  <li class="ms-2"><a href="#" class="link-dark rounded text-decoration-none">Ventas</a></li>
                  <li class="ms-2"><a href="#" class="link-dark rounded text-decoration-none">Producción</a></li>
                  <li class="ms-2"><a href="#" class="link-dark rounded text-decoration-none">Inventario</a></li>
                </ul>
              </div>
            </li>
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
                        <li class="ms-4"><a href="?controlador=rol&accion=inicio" class="link-dark rounded text-decoration-none">Roles</a></li>
                        <li class="ms-4"><a href="?controlador=permiso&accion=inicio" class="link-dark rounded text-decoration-none">Permisos</a></li>
                        <li class="ms-4"><a href="#" class="link-dark rounded text-decoration-none">Conexión</a></li>
                        <li class="ms-4"><a href="#" class="link-dark rounded text-decoration-none">Sesión</a></li>
                        <li class="ms-4"><a href="?controlador=pago&accion=inicio" class="link-dark rounded text-decoration-none">Metodo Pago</a></li>
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
                        <li class="ms-4"><a href="?controlador=usuario&accion=inicio" class="link-dark rounded text-decoration-none">Usuarios</a></li>
                        <li class="ms-4"><a href="?controlador=empleado&accion=inicio" class="link-dark rounded text-decoration-none">Empleado</a></li>
                        <li class="ms-4"><a href="?controlador=area&accion=inicio" class="link-dark rounded text-decoration-none">Area</a></li>
                      </ul>
                    </div>
                  </li>

                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#mantenimiento-collapse" aria-expanded="false">
                    <i class="fas fa-tools"></i>
                    Mantenimiento
                  </button>
                  <div class="collapse" id="mantenimiento-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li class="ms-4"><a href="/?controlador=empleado&accion=inicio" class="link-dark rounded text-decoration-none">Empleado</a></li>
                    </ul>
                  </div>

                  <li class="ms-2"><a href="#" class="link-dark rounded text-decoration-none">Configuración</a></li>
                </ul>
              </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
              </button>
              <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark rounded">New...</a></li>
                  <li><a href="#" class="link-dark rounded">Profile</a></li>
                  <li><a href="#" class="link-dark rounded">Settings</a></li>
                  <li><a href="#" class="link-dark rounded">Sign out</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col col-9 py-5">
        <div class="container">
          <?php include_once("ruteador.php"); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
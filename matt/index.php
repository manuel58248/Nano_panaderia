<?php
$controlador = "dashboard";
$accion = "inicio";

if (isset($_GET['controlador']) && isset($_GET['accion'])) {
  if (($_GET['controlador'] != "") && ($_GET['accion'] != "")) {
    $controlador = $_GET['controlador'];
    $accion = $_GET['accion'];
  }
}

try {

  session_start();
  $session = $_SESSION['session'];
  
  if ($session == NULL) {
    include_once("controladores/controlador_login.php");
    $login = new ControladorLogin();
    $login->login();
  } else {
    require_once("vistas/template.php");
  }
} catch (Exception $e) {
  echo "Error: " . $e;
}

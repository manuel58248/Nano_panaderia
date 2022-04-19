<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$consulta = "SELECT * FROM cat_usuario WHERE usr_nombre='$usuario' AND usr_clave = '$password' AND usr_estado= 1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if ($resultado->rowCount() >= 1) {
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    
    $_SESSION["s_usuario"] = $usuario;
    $_SESSION["URL"] = "http://localhost/PanaderiaNano/dashboard/page";
    $_SESSION["LOGOUT"] = "http://localhost/PanaderiaNano/bd/logout.php";
    $_SESSION["LOGIN"] = "http://localhost/PanaderiaNano/index.php";

} else {
    $_SESSION["s_usuario"] = null;
    $data = null;
}

print json_encode($data);
$conexion = null;

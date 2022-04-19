<?php
include_once("./modelos/usuario.php");
include_once("conexion.php");

class ControladorLogin
{

    public function login()
    {

        if ($_POST) {
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contraseña'];

            $password_hash = hash('sha512', $contrasenia);

            $usuario_login = Usuario::login($usuario, $contrasenia);

            if ($usuario_login->usr_estado == '1') {

                session_start();
                $_SESSION['session'] = $usuario_login->usr_codigo;


                // consultar que rol tiene el usuario  y me imprima que usuario tendra y almacenar una variable global
                header("location:./?controlador=dashboard&accion=inicio");
            } else {
                // El usurio esta inactivo, redirigir a una pagina que le diga que esta inactivo
            }
        }

        include_once('./vistas/paginas/login/login.php');
    }
}

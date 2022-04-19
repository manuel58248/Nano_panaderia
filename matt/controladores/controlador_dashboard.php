<?php
include_once('./modelos/usuario.php');

class ControladorDashboard
{
    public function inicio()
    {

        $session = $_SESSION['session'];
        $usuario = Usuario::buscar($session);
        $usuario = Usuario::Obtener_rol($session);

        include_once('./vistas/paginas/dashboard/inicio.php');
    }
}

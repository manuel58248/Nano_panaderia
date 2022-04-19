<?php
include_once("./modelos/usuario.php");
include_once("conexion.php");

class ControladorUsuario
{
  public function inicio()
  {
    $usuarios = Usuario::inicio();
    include_once("./vistas/paginas/usuario/inicio.php");
  }

  public function crear()
  {
    if ($_POST) {
      $usr_email = $_POST['usr_email'];
      $usr_nombre = $_POST['usr_nombre'];
      $usr_clave = $_POST['usr_clave'];
      $password_hash = hash('sha512', $usr_clave);

      Usuario::crear($usr_email, $usr_nombre, $password_hash);

      header("Location:./?controlador=usuario&accion=inicio");
    }

    include_once("./vistas/paginas/usuario/crear.php");
  }

  public function editar()
  {

    if ($_POST) {
      $usr_codigo = $_POST['usr_codigo'];
      $usr_email = $_POST['usr_email'];
      $usr_nombre = $_POST['usr_nombre'];
      $usr_clave = $_POST['usr_clave'];
      $password_hash = hash('sha512', $usr_clave);
      $usr_estado = $_POST['usr_estado'];

      Usuario::editar(
        $usr_codigo,
        $usr_email,
        $usr_nombre,
        $password_hash,
        $usr_estado
      );
      header("Location: ./?controlador=usuario&accion=inicio");
    }
    $usr_codigo = $_GET['usr_codigo'];

    $usuario = (Usuario::buscar($usr_codigo));
    include_once("vistas/paginas/usuario/editar.php");
  }

  public function borrar()
  {
    $usr_codigo = $_GET['usr_codigo'];

    Usuario::borrar($usr_codigo);

    header("Location:./?controlador=usuario&accion=inicio");
  }

  public function roles() {

    include_once("./modelos/rol.php");
    $usuario_codigo = $_GET['usr_codigo'];

    if($_POST) {
      $rol_codigo = $_POST['rol_codigo'];

      include_once("./modelos/usuario-rol.php");
      UsuarioRol::crear($usuario_codigo, $rol_codigo);

      header("location:./?controlador=usuario&accion=inicio");
    }


    $listaRoles = Rol::inicio();
    include_once("./vistas/paginas/usuario/roles.php");
  }
}

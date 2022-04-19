<?php 

include_once("./conexion.php");

class Cliente{

    public $clt_codigo;
    public $clt_cedula_ruc;
    public $clt_usuario_id;
    public $clt_nombre;
    public $clt_telefono;
    public $clt_direccion;
    public $clt_fecha_nacimiento;
    public $clt_genero_persona;

    public function __construct($clt_codigo,$clt_cedula_ruc, $clt_usuario_id, $clt_nombre,$clt_telefono,$clt_direccion,$clt_fecha_nacimiento,$clt_genero){

           $this->clt_codigo=$clt_codigo;
            $this->clt_cedula_ruc= $clt_cedula_ruc;
            $this->clt_usuario_id=$clt_usuario_id;
            $this->clt_nombre= $clt_nombre;
            $this->clt_telefono=$clt_telefono;
            $this->clt_direccion= $clt_direccion;
            $this->clt_fecha_nacimiento=$clt_fecha_nacimiento;
            $this->clt_genero=$clt_genero;



    }   
    
    public static function inicio(){
        try {
            $listaCliente =[];
        
            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql= $conexionBD->query("SELECT * FROM tbl_cliente");

            foreach($sql->fetchAll() as $cliente){

                $listaEmpleados[] = new Cliente ($cliente['clt_codigo'],$cliente['clt_cedula_ruc'],$cliente['clt_usuario_id'],$cliente['clt_nombre'], $cliente['clt_telefono'], $cliente['clt_direccion'], $cliente['clt_fecha_nacimiento'], $cliente['clt_genero']);
        
        
        
        }
            
        return $listaCliente;
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
        return [];
    }


    }

    public static function crear($clt_cedula_ruc,$clt_usuario_id,$clt_nombre,$clt_telefono,$clt_direccion, $clt_fecha_nacimiento, $clt_genero){

            
        $conexionBD=BaseDeDatos:: obtenerInstancia();
        $sql= $conexionBD->prepare("INSERT INTO tbl_cliente(clt_cedula_ruc,clt_usuario_id, clt_nombre,clt_telefono,clt_direccion,clt_fecha_nacimiento,
         clt_genero) VALUES (?,?,?,?,?,?,?)");

        $sql->execute(array($clt_cedula_ruc,$clt_usuario_id,$clt_nombre,$clt_telefono, $clt_direccion,$clt_fecha_nacimiento,$clt_genero));
  
    }
    public static function buscar($clt_codigo)
    {
        try {
            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->prepare("SELECT * FROM tbl_empleado WHERE empl_codigo=?");
            $sql->execute(array($clt_codigo));
            $cliente = $sql->fetch();
            return new Cliente($cliente['clt_codigo'],$cliente['clt_cedula_ruc'] ,$cliente['clt_usuario_id'], $cliente['clt_nombre'], $cliente['clt_telefono'], $cliente['clt_direccion'], $cliente['clt_fecha_nacimiento'],$cliente['clt_genero']);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public static function editar($clt_codigo,$clt_cedula_ruc, $clt_usuario_id, $clt_nombre,$clt_telefono,$clt_direccion,$clt_fecha_nacimiento,$clt_genero)
    {
        try {
            $conexionBD = BaseDeDatos::obtenerInstancia();
            $sql = $conexionBD->prepare("UPDATE tbl_cliente SET  clt_cedula_ruc=?, clt_nombre=?,clt_telefono=?,clt_direccion=?, clt_fecha_nacimiento=? , clt_genero=? WHERE clt_codigo=? ");
            $sql->execute(array($clt_codigo,$clt_cedula_ruc, $clt_usuario_id, $clt_nombre,$clt_telefono,$clt_direccion,$clt_fecha_nacimiento,$clt_genero));
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }


}


?>
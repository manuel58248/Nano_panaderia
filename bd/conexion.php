<?php
class Conexion
{
    public static function Conectar()
    {
        // define('servidor', 'localhost');
        // define('nombre_bd', 'matt');
        // define('usuario', 'root');
        // define('password', '');


        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try {
            $conexion = new PDO("mysql:host=localhost;dbname=matt", "root", "", $opciones);
            return $conexion;
        } catch (Exception $e) {
            die("El error de Conexión es :" . $e->getMessage());
        }
    }
}

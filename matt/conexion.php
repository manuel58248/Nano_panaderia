<?php
class BaseDeDatos
{

    private static $instancia = NULL;

    public static function obtenerInstancia()
    {

        if (!isset(self::$instancia)) {
            $opcionesPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            // self::$instancia= new PDO('mysql:host=;dbname=','','', $opcionesPDO);
            self::$instancia = new PDO('mysql:host=localhost;dbname=matt', 'root', '', $opcionesPDO);
        }

        return self::$instancia;
    }
}

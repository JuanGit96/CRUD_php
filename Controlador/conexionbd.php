<?php
class Basededatos
{
    private static $basedatos = 'comercializadoraABC' ;
    private static $servidor = 'localhost' ;
    private static $usuario = 'root';
    private static $clave = '123456';
     
    private static $conexion  = null;
     
    public function __construct() {
        die('No se pudo inicializar la función constructora');
    }
     
    public static function conectarbd()
    {
       // Conexion para toda la aplicación
       if ( null == self::$conexion )
       {     
        try
        {
          self::$conexion =  new PDO( "mysql:host=".self::$servidor.";"."dbname=".self::$basedatos, self::$usuario, self::$clave); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$conexion;
    }
     
    public static function desconectarbd()
    {
        self::$conexion = null;
    }
}
?>

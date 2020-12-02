<?php
namespace Clases;

use PDO;
use PDOException;

class Conexion{
    protected static $conexion;

    public function __construct()
    {
        if(self::$conexion==null){
            self::crearConexion();
        }
    }

    private static function crearConexion(){
        $op = parse_ini_file("../config.ini");
        $user = $op['user'];
        $pass = $op['pass'];
        $bbdd = $op['bbdd'];

        $dsn = "mysql:host=localhost;dbname=$bbdd;charset=utf8mb4";

        try{
            self::$conexion = new PDO($dsn,$user,$pass);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Error al conectar a la bbdd");
        }
    }
    
}
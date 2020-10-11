<?php

class Conexion
{

    public static function conectar()
    {

        $user = 'root';
        $pass = 'root';
        $host = 'localhost';
        $db = 'usuarios';
        $conStr = "mysql:host" . $host . ";dbname=" . $db . "charset=utf8";
        try {
            $connect = new PDO($conStr, $user, $pass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "ERROR: " . $e->getMessage() . '</br>';
            die('ERROR');
        }
        return $connect;
    }
}

<?php

class Conexion
{

    private $user = 'root';
    private $pass = 'root';
    private $host = 'localhost';
    private $db = 'usuarios';
    private $connect;
    
    public function __construct()
    {
        $conStr = "mysql:host".$this->host.";dbname=".$this->db."charset=utf8";
        try {
            $this->connect = new PDO($conStr, $this->user, $this->pass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "ERROR: " . $e->getMessage() . '</br>';
            die('ERROR');
        }
    }

    public function Connect(){
        return $this->connect;
    }
    
}

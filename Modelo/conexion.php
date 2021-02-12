<?php 

class Conectar
{
    public static function connectBD()
    {
        $user = 'root';
        $pass = 'Rockheavymetal123@';

        try {
            $bd = new PDO('mysql:host=localhost;dbname=usuarios', $user, $pass);
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bd->exec('SET CHARACTER SET UTF8');
            echo "Conectado";
        } catch (PDOException $e) {
            print "ERROR: " . $e->getMessage() . '</br>';
            die('ERROR');
        }
    }
}
?>
<?php
require_once("autoload.php");
class Usuario extends Conexion
{
    private $usuarios;
    private $roles;
    private $bd;

    public function __construct()
    {
        $this->bd = new Conexion();
        $this->bd = $this->bd->Connect();
        $this->usuarios = array();
        $this->roles = array(array());
    }


    public function getUsuarios()
    {

        $sql = "SELECT * FROM usuario";
        $execute = $this->bd->query($sql);
        $this->usuarios = $execute->fetchAll(PDO::FETCH_ASSOC);
        return $this->usuarios;
    }
    public function rol_usuario($id)
    {
        $this->roles = array();
        foreach ($this->bd->query("SELECT rol.nombre FROM rol INNER JOIN rol_usuario ON rol_usuario.id_rol=rol.id_rol
             INNER JOIN usuario ON rol_usuario.id_usuario = usuario.id_usuario WHERE usuario.id_usuario = " . $id) as $rol) {
            $this->roles[] = $rol;
        }
        return $this->roles;
    }
}
